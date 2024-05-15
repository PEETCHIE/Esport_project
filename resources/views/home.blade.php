<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __() }}
        </h2>
    </x-slot>
    <div class="w-30 h-50">
        <img src="{{ url('img/bg_head.png') }}" alt="">
    </div>


</x-app-layout>
