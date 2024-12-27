<div class="mx-auto rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
        <div class="mt-2">
            <div class="mt-4">
                <x-input-label for="email" :value="__('ui.email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
                    autofocus autocomplete="email" placeholder="{{__('ui.enter_email')}}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="password" :value="__('ui.password')" />
                <x-text-input wire:model="password" name="password" type="password" required autocomplete="password"
                    placeholder="{{__('ui.enter_password')}}" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input wire:model="remember" id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 flex flex-col justify-between sm:items-center sm:flex-row-reverse sm:px-6">
        <div class="sm:flex sm:flex-row-reverse">
            <x-primary-button wire:click="authenticate" type="button">
                {{__('auth.login')}}
            </x-primary-button>
            <x-second-link href="{{ route('home') }}">
                {{__('ui.cancel')}}
            </x-second-link>
        </div>
        <a href="{{ route('password.request') }}" class="mt-6 sm:mt-0">
            {{ __('auth.forgot_password') }}
        </a>
    </div>
</div>