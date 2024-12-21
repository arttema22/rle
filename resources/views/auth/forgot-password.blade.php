<x-layouts.app>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mx-auto rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="text-center sm:text-left">
                    <div class="mt-2">
                        <div class="mt-4">
                            <label class="text-gray-800 text-sm mb-2 block">{{__('ui.email')}}</label>
                            <input wire:model="email" name="email" type="email" required autofocus autocomplete="email"
                                class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600"
                                placeholder="{{__('Enter email')}}" />
                            <div class="text-red-600">@error('email') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="submit"
                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                    {{__('ui.send')}}
                </button>
            </div>
        </div>
    </form>
</x-layouts.app>
