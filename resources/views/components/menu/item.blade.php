<button
    x-menu:item
    :class="[
        'bg-slate-100 text-gray-900': $menuItem.isActive,
        'text-gray-600': !$menuItem.isActive,
        'opacity-50 cursor-not-allowed': $menuItem.isDisabled,
        is_string($menuItem.classes) ? $menuItem.classes : '', // Safely include dynamic classes
    ]"
    class="flex text-sm items-center gap-2 w-full px-3 py-1.5 text-left hover:bg-slate-50 disabled:text-gray-500 transition-colors"
    {{ $attributes->except('class')->merge(['type' => 'button']) }} 
>
    {{ $slot }}
</button>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('menuItem', (menuItem) => ({
            menuItem: @js($menuItem), // Pass $menuItem to Alpine.js
        }));
    });
</script>