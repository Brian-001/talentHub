<div class="relative text-sm text-gray-800">
    <div class="absolute pl-2 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
        <x-icons.magnifying-glass />
    </div>
    <input id="search" type="text" wire:model.live.debounce.300ms="search" placeholder="Search..." class="block w-full rounded-lg border-0 py-1.5 md:py-3 
    pl-10 text-gray-900 ring-1 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-slate-600">
</div>
