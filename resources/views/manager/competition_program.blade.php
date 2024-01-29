<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Competition schedule') }}
        </h2>
    </x-slot>
    <table class="table table-bordered">
        <tbody>
            @foreach($detail as $index)
            <div>
                Team 1: {{ $index-> team1_id}}
                NAME 1 : {{ $index-> team1_name}}<br>
                Team 2: {{ $index-> team2_id }}
                NAME 2 : {{ $index-> team2_name}}
                <br><br>
            </div>
        @endforeach
        
        </tbody>
    </table>
</x-app-layout>