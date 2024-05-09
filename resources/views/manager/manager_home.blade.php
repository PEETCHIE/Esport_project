<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-right">
                    <form action="{{ route('generatePDF') }}" target="_blank">
                        <button
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded m-1">PDF</button>
                    </form>
                </div>

                <div class="grid grid-cols-4 pt-1">
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class=" mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-yellow-400 rounded-md px-2 text-[20px] ">
                                รายการแข่งขัน</p>
                            <p class="text-[18px] pt-4 text-dark  text-right px-2">
                                {{ $count_competition_lists }} รายการ</p>
                        </div>
                    </div>
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class=" mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-sky-500 rounded-md px-2 text-[20px]">
                                รายการแข่งขันที่ยังไม่จบ</p>
                            <p class="text-[18px] pt-4 text-dark  text-right px-2">
                                {{ $count_not_end }} รายการ</p>
                        </div>
                    </div>
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class=" mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-lime-700 rounded-md px-2 text-[20px]">
                                รายการแข่งขันที่จบแล้ว</p>
                            <p class="text-[18px] pt-4 text-dark  text-right px-2">
                                {{ $count_end }} รายการ</p>
                        </div>
                    </div>
                </div>



                <div class="border m-2 rounded p-1">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ไอดี</th>
                                <th class="border px-4 py-2">ชื่อการแข่งขัน</th>
                                <th class="border px-4 py-2 text-center">จำนวน</th>
                                <th class="border px-4 py-2 text-center">จำนวนทีม</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataList as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->id }}</td>
                                    <td class="border px-4 py-2">{{ $item->competition_name }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $item->competition_amount }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        @foreach ($count_teams as $count)
                                            @if ($count->cl_id == $item->id)
                                                {{ $count->team_count }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4 ">
                        {{ $dataList->links() }}
                    </div>
                </div>
                {{-- <div class="grid grid-cols-2 grid-flow-row mt-3">
                    <div class="border m-2 rounded p-1">HI</div>
                    <div class="border m-2 rounded p-1">HO</div>
                </div> --}}
            </div>
        </div>
    </div>


</x-app-layout>



<script>
    @if (session('alert'))
        Swal.fire({
            icon: '{{ session('alert')['icon'] }}',
            title: '{{ session('alert')['title'] }}',
            text: '{{ session('alert')['text'] }}',
        });
    @endif
</script>
