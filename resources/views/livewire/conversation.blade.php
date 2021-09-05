<div wire:poll>

    <hr><hr><hr><hr><hr>
    <br>
    
    @foreach($conversation->messages as $message)
    <div class="rounded-lg slimscrollr px-3 py-3 mb-2 font-medium
    {{ $message->user->id === auth()->user()->id  ? 'bg-green-500 text-white mr-auto max-w-1/2 w-1/2' : 'ml-auto bg-gray-300 text-gray-700 max-w-1/2 w-1/2'}}">
    
        <img src="{{ URL::to('/images/'. $message->user->avatar) }}" alt="{{ $message->user->avatar }}" class="thumb-md rounded-circle mr-2"><i></i>{{ $message->user->id === auth()->user()->id  ? 'Vous avez dit : ' : $message->user->name . ' a dit :'}}
        <p>{{ $message->content }}</p>
       
    </div>
    @endforeach

    <hr><hr><hr><hr><hr>
    <br>
    <form wire:submit.prevent="sendMessage" >
    <div class="row">
          <div class="col-sm-9 col-8 chat-inputbar">
                <input wire:model.defer="message" type="text" class="form-control chat-input" placeholder="Nouveau message">
         </div>
          <div class="col-sm-3 col-4 chat-send">
          <a href="javascript:history.back(1)"><button type="submit" class="btn btn-success btn-block">Envoyer</button></a>
          </div>
    </div>
    <br>
    </form>
</div>

