<?php

namespace App\Http\Livewire;
use App\Models\Message;

use App\Models\User;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Conversation extends Component
{

    public $conversation;
    public $message;
    protected $listeners = ['sent' => '$refresh'];

    public function mount($conversation)
    {
        $this->conversation = $conversation;
       
    } 
    public function sendMessage()
    {
    
            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $this->conversation->id,
                'content' => $this->message
            ]);
            $user = User::find($this->conversation->from);
        
            $user1 =User::find($this->conversation->to);
           
           if(auth()->user()->id === $this->conversation->from)
           {
            Notification::send($user1, new MessageNotification(auth()->user()->name));
           }
           if(auth()->user()->id === $this->conversation->to)
           {
            Notification::send($user, new MessageNotification(auth()->user()->name));
           }

            $this->message = '';
            
            
        
    }
    private function checkSpam()
    {
        $response = Message::whereBetween('created_at', [\Carbon\Carbon::now()->subMinutes(1)->toDateTimeString(), \Carbon\Carbon::now()])->where('user_id', auth()->user()->id)->get();
        
        if (!$response->isEmpty()) {
            $this->emit('flash-message', 'Vous ne pouvez pas poster plus d\'un message par minute', 'warning');
            return false;
        } else {
            return true;
        }
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.conversation',compact('users'));
    }
}
