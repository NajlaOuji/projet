<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;
class ConversationController extends Controller
{
    
    public function index()
    {
        $conversations = auth()->user()->conversations()->latest()->get();
     
        $users = User::all();
        $messages = Message::all();
        return view('conversations.conversation',compact('users','conversations','messages'));  
    }
    
    public function show(Conversation $conversation)
    {
        $users = User::all();
        return view('conversations.show',compact('users','conversation'));
    }

    public function delete($id)
    {
        $mesagge = Message::where('conversation_id',$id)->delete();
        $conversation = Conversation::where('id',$id)->delete();
        Toastr::success('conversation deleted successfully :)','Success');
        return back();
    }
}
