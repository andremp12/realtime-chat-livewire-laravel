<div>
    <div class="w-full flex p-4 gap-4">
        <div class="p-4 bg-gray-100 rounded-lg min-h-52 w-1/3">
            <h1 class="text-lg text-gray-800 font-semibold">Chats</h1>
            <hr class="h-4">
            @foreach($users as $user)
                <div wire:click="roomChat({{$user}})" class="w-full rounded-lg bg-white flex gap-4 p-4 hover:bg-black/10 mb-2">
                    <div class="avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                        </div>
                    </div>
                    <div>
                        <h1 class="font-semibold text-sm text-gray-800 capitalize">{{$user->username}}</h1>

                        <p class="text-gray-800 font-medium text-xs cursor-default">{{$chats->last()->message}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="w-1/3">
        @livewire('chat')
        </div>
    </div>
</div>
