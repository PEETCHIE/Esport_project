<x-app-layout>
    @foreach($streams as $stream)
            <li>{{ $stream['title'] }} - {{ $stream['user_name'] }}</li>
        @endforeach
</x-app-layout>