<div>
    @guest
    <button wire:click="open"
        class='px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>
        {{__('Login')}}
    </button>
    @endguest




    @auth
    <span class="inline-flex rounded-md">
        <button type="button"
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
            {{Auth::user()->last_name}}
        </button>
        <button wire:click="logout"
            class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
            {{__('Log Out')}}
        </button>
    </span>
    @endauth


    @if ($isOpenloginForm)
    <div class="absolute top-7 right-0">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="text-center sm:text-left">
                        <div class="mt-2">
                            <div class="mt-4">
                                <label class="text-gray-800 text-sm mb-2 block">{{__('Email')}}</label>
                                <input wire:model="email" name="email" type="email" required autofocus
                                    autocomplete="email"
                                    class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                    placeholder="{{__('Enter email')}}" />
                                <div class="text-red-600">@error('email') {{ $message }} @enderror</div>
                            </div>
                            <div class="mt-4">
                                <label class="text-gray-800 text-sm mb-2 block">{{__('Password')}}</label>
                                <input wire:model="password" name="password" type="password" required
                                    autocomplete="password"
                                    class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                    placeholder="{{__('Enter password')}}" />
                                <div class="text-red-600">@error('password') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button wire:click="authenticate" type="button"
                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">{{__('Login')}}</button>
                    <button wire:click="close" type="button"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">{{__('Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>