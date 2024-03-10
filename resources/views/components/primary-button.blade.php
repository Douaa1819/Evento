<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-gray-700 active:bg-gray-900    transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
