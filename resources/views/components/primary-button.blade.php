<button {{ $attributes->merge(['type' => 'submit',
 'class' => 'inline-flex justify-center items-center sm:ml-3 px-4 py-2 bg-green-800 border
 border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest
 hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2
 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full
 sm:w-auto']) }}>
    {{ $slot }}
</button>