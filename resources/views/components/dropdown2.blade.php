<div class="relative inline-flex items-center" x-data="{ open: false }" @click.outside="open = false"
    @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-75 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 -translate-y-2" class="absolute z-50 mt-2 w-48 rounded-md shadow-lg"
        style="display: none; left: 25%; transform: translateX(-50%); transform: translateY(50%)" @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-3 my-3 p-2 bg-gray-600 dark:bg-gray-700">
            {{ $content }}
        </div>
    </div>

</div>
