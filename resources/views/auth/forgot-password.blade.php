<x-layouts.app>
    @if (session('status'))
    <div class="mx-auto rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="mt-2">
                <div class="mt-4">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mx-auto rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="mt-2">
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('ui.email')" />
                        <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                            required autofocus autocomplete="email" placeholder="{{__('ui.enter_email')}}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <x-primary-button>
                    {{__('ui.send')}}
                </x-primary-button>
                <x-second-link href="{{ route('home') }}">
                    {{__('ui.cancel')}}
                </x-second-link>
            </div>

        </div>
    </form>
</x-layouts.app>