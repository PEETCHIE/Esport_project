<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Competition Program') }}
        </h2>
    </x-slot>
    @foreach ($matches as $match)
        {{ $match->matches }}
    @endforeach
    
    @foreach($buckets as $bucket)
        @foreach($bucket as $item)
            {{ $item->t_name }} 
            {{ $item->logo }} <br> 
        @endforeach
    @endforeach
   
</x-app-layout>

<script>
    
    @if(session('alert'))
            Swal.fire({
                icon: '{{ session('alert')['icon'] }}',
                title: '{{ session('alert')['title'] }}',
                text: '{{ session('alert')['text'] }}',
            });
        @endif
</script>