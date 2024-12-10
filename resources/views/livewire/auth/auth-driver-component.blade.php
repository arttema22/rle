<div>

    @if ($errors->any())
    <div}>
        @foreach ($errors->all() as $error)
        <div class="bg-red-100 text-red-700 px-2 py-1 mt-1 rounded-lg" role="alert">
            <span class="block text-sm sm:inline max-sm:mt-2">{{ $error }}</span>
        </div>
        @endforeach
</div>
@endif

@session('status')
<div class="mb-4 font-medium text-sm text-green-600">
    {{ $value }}
</div>
@endsession

<form wire:submit="authenticate">
    <input type="text" wire:model="email">
    <div>
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </div>

    <input type="text" wire:model="password">
    <div>
        @error('password') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            {{-- <x-checkbox id="remember_me" name="remember" /> --}}
            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('password.request') }}">
    {{ __('Forgot your password?') }}
    </a> --}}

    <button type="submit">Save</button>
</form>
</div>