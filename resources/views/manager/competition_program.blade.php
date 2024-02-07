<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('จัดการตารางข้อมูลการแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-row">
        @foreach($buckets as $bucket)
            <div class="mx-8 w-48 grid-cols-3 gap-3">
                @foreach($bucket as $item)
                    <b>{{$item->matches}}</b>
                    <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                        <div class="flex items-center justify-center mx-auto">
                            <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                            <span class="ml-2">
                                {{ $item->t_name }}  
                            </span>
                        </div>
                        <div class="border bg-white text-black flex items-center justify-center w-10">
                            0
                        </div>
                    </div>
                    <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">edit</button>
                    @endforeach
                </div> 
        @endforeach
    </div>
</x-app-layout>

<!-- <script>
        @if(session('alert'))
            Swal.fire({
                icon: '{{ session('alert')['icon'] }}',
                title: '{{ session('alert')['title'] }}',
                text: '{{ session('alert')['text'] }}',
            });
        @endif
</script> -->