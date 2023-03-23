<div class="my-10 flex justify-center w-full">
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">Login</h1>
        <hr>
        <div class="my-4">
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Username"
                        wire:model="form.username" />
                    @error('form.username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="text" class="p-2 rounded border shadow-sm w-full" placeholder="Password"
                        wire:model="form.password" />
                    @error('form.password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <button
                    class="p-2 bg-gray-800 text-white w-full rounded tracking-wider cursor-pointer" wire:click='login()'>Login</button>
                </div>
            </div>
        </div>
    </section>
</div>
