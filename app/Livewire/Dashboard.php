<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $chats;

    public function roomChat($data){
        $this->dispatch('roomChat',data:$data);
    }
    public function render()
    {
        $this->chats = \App\Models\Chat::where('from_id',Auth::user()->id)->orWhere('to_id',Auth::user()->id)->get();
        return view('livewire.dashboard',[
            'users'=>User::with(['sendMessages','receivedMessages'])->where('id','!=',Auth::user()->id)->get(),
//            'messages'=> $this->chats
        ]);
    }
}
