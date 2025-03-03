<div>
    <form wire:submit.prevent="login">
        <div class="p-4 rounded-lg bg-gray-100">
            <h1 class="text-xl font-semibold text-gray-800 mb-4">Login User</h1>
            <label class="input input-bordered @error('email') input-error @enderror flex items-center gap-2 mb-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                        d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                    <path
                        d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                </svg>
                <input wire:model="email" name="email" type="text" class="grow" placeholder="Email" />
            </label>
            @error('email')
            <p class="mb-2 text-sm text-red-600 block">{{ $message }}</p>
            @enderror
            <label class="input input-bordered @error('password') input-error @enderror flex items-center gap-2 mb-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                        fill-rule="evenodd"
                        d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                        clip-rule="evenodd" />
                </svg>
                <input wire:model="password" name="password" type="password" class="grow"/>
            </label>
            @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <div class="w-full">
                <button type="submit" class="mb-2 btn btn-primary btn-block">Login</button>
                <a  href="/register" wire:navigate>
                    <button type="button"  class="btn btn-outline btn-primary btn-block">Register</button>
                </a>
            </div>
        </div>
    </form>
</div>
