<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('จัดการตารางข้อมูลการแข่งขัน') }}
        </h2>
    </x-slot>

    @foreach($buckets as $bucket)
        <div class="grid grid-cols-rows">
            <div class="mx-8 w-48 grid-cols-3 gap-3">
                @php $buttonDisplayed = false; @endphp
                @foreach($bucket as $index => $item)
                    @if($item->round == 'R1')
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
                        @if($index == 0 && !$buttonDisplayed)
                        <form action="{{ route('edit_competition_program', $item->cp_id)}}">
                        <div class="absolute transform translate-x-1 -translate-y-2">
                            <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">edit</button>
                        </div>
                    </form>
                        @php $buttonDisplayed = true; @endphp

                        @endif
                    @endif
                    @if($item->round == 'R2')
                    {{-- <br>
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
                        @if($index == 0 && !$buttonDisplayed)
                        <div class="absolute transform translate-x-1 -translate-y-2">
                            <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">edit</button>
                        </div>
                        @php $buttonDisplayed = true; @endphp
                        @endif --}}
                    @endif
                @endforeach
            </div>
        </div>
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