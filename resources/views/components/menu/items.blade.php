<div
    x-menu:items
    x-show="menuOpen"
    class="absolute right-0 min-w-[10rem] z-10 bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg py-1 outline-none"
    x-cloak
>
    <!-- Cancel Icon -->
    <div class="flex justify-end px-3 py-2">
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-3 w-3 cursor-pointer text-gray-700 hover:text-gray-900" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor"
            x-on:click="menuOpen = false"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>

    {{ $slot }}
</div>