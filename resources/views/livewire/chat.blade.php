<div class="">
    @if($user)
    <form wire:submit.prevent="sendMessage" class="relative h-full">
    <div class="bg-gray-100 rounded-lg min-h-[500px] w-full relative max-h-[500px]">
        <div class="p-4 shadow-sm">
            <h1 class="text-lg text-gray-800 font-semibold capitalize">{{$user['username']}}</h1>
        </div>
        <div wire:poll id="chat-container" class="mb-2 p-4 max-h-[375px] overflow-y-scroll">
            @foreach($chats as $chat)
                @if($chat->to_id == \Illuminate\Support\Facades\Auth::user()->id)
                    <div class="chat chat-start">
                        <div class="chat-bubble">{{$chat->message}}</div>
                        <div class="chat-footer opacity-50">{{\Carbon\Carbon::parse($chat->created_at)->translatedFormat('h:i')}}</div>
                    </div>
                @endif
                @if($chat->from_id == \Illuminate\Support\Facades\Auth::user()->id)
                    <div class="chat chat-end ">
                        <div class="chat-bubble">{{$chat->message}}</div>
                        <div class="chat-footer opacity-50">{{\Carbon\Carbon::parse($chat->created_at)->translatedFormat('h:i')}}</div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="w-full absolute inline z-10 left-0 bottom-0 p-2">
            <textarea wire:model="userMessage" wire:keydown.enter="handleEnter" class="textarea-xs w-full" placeholder="Send your Message"></textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 px-2 py-1 rounded-lg text-white absolute right-0 me-4 top-0 translate-y-[50%]">Send</button>
        </div>
    </div>
    </form>
    @endif
</div>

<script>
    document.addEventListener("livewire:load", function() {
        // Auto-scroll ke bawah setiap kali tampilan diperbarui
            let chatContainer = document.getElementById("chat-container");
            chatContainer.scrollTop = chatContainer.scrollHeight;
    });


    Livewire.on('loadMessage',()=>{
        setTimeout(latestMessage,10)
    })

    function latestMessage(){
        let chatContainer = document.getElementById("chat-container");
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

</script>

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        document.addEventListener("livewire:load",function (){--}}
{{--            Livewire.hook('message.processed',(message,component)=>{--}}
{{--                let chatContainer = document.getElementById('chats');--}}
{{--                chatContainer.scrollTop = chatContainer.scrollHeight--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}
