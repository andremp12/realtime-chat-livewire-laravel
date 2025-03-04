<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $chats=[];
    public $user=null;
    public $userMessage="";

    public $listeners=['roomChat'];
    public function roomChat($data){
        $this->user=$data;

        $this->dispatch('loadMessage');
    }

    public function handleEnter($event){
        if($event['shiftKey']){
            $this->userMessage .= "\n";
        }else{
            $this->sendMessage();
        }
    }
    public function sendMessage(){
        if($this->userMessage!=null || trim($this->userMessage) != "") {
            $chat = new \App\Models\Chat();
            $chat->from_id = Auth::user()->id;
            $chat->to_id = $this->user['id'];
            $chat->message = $this->userMessage;
            $chat->save();
        }

        $this->userMessage=null;

        $this->dispatch('loadMessage');
    }
    public function render()
    {
        if($this->user!=null) {
            $this->chats = \App\Models\Chat::with(['toId', 'fromId'])
                ->where(function ($query) {
                    $query->where('from_id',Auth::user()->id)->where('to_id',$this->user['id']);
                })
                ->orWhere(function ($query) {
                    $query->where('from_id', $this->user['id'])->where('to_id',Auth::user()->id);
                })
                ->orderBy('created_at')->get();
        }
        return view('livewire.chat',['chats'=>$this->chats]);
    }
}
