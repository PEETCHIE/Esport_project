<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Competition schedule') }}
        </h2>
    </x-slot>
    <table class="table table-bordered">
        <tbody>
           @foreach($pairsArray as $index)
            {{$index}} <br>
           @endforeach
        </tbody>
    </table>
</x-app-layout>