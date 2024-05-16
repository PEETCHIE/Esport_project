<!-- resources/views/manager/pdf.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-4 pt-3">
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class="mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-yellow-400 rounded-md px-2 text-[20px]">
                                รายการแข่งขัน
                            </p>
                            <p class="text-[18px] pt-4 text-dark text-right px-2">
                                {{ $count_competition_lists }} รายการ
                            </p>
                        </div>
                    </div>
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class="mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-sky-500 rounded-md px-2 text-[20px]">
                                รายการแข่งขันที่ยังไม่จบ
                            </p>
                            <p class="text-[18px] pt-4 text-dark text-right px-2">
                                {{ $count_not_end }} รายการ
                            </p>
                        </div>
                    </div>
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class="mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-lime-700 rounded-md px-2 text-[20px]">
                                รายการแข่งขันที่จบแล้ว
                            </p>
                            <p class="text-[18px] pt-4 text-dark text-right px-2">
                                {{ $count_end }} รายการ
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border m-2 rounded p-1">
                    <div class="grid grid-cols-2 grid-flow-row">
                        <div class="my-4 text-left mx-4 grid-cols-2">
                            <label for="listType" class="text-gray-700">เลือก :</label>
                            <select id="listType" name="listType" class="ml-2 border rounded -px-2 py-1">
                                <option value="all" selected>รายการแข่งขันทั้งหมด</option>
                                <option value="ongoing">รายการแข่งขันที่กำลังดำเนินการ</option>
                                <option value="ended">รายการแข่งขันที่เสร็จสิ้นแล้ว</option>
                            </select>
                        </div>
                        <div class="my-4 text-right mx-4 grid-cols-2">
                            <form id="pdfForm" action="{{ route('generatePDF') }}" method="GET" target="_blank">
                                <input type="hidden" id="pdfListType" name="listType" value="all">
                                <button type="submit"
                                    class="bg-red-100 hover:bg-red-200 text-white font-bold py-1 px-1 rounded m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-file-type-pdf" width="44" height="44"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                        <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                                        <path d="M17 18h2" />
                                        <path d="M20 15h-3v6" />
                                        <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ชื่อการแข่งขัน</th>
                                <th class="border px-4 py-2 text-center">จำนวนที่เปิดรับสมัคร</th>
                                <th class="border px-4 py-2 text-center">จำนวนทีม</th>
                                <th class="border px-4 py-2 text-center">จำนวนคนในทีม</th>
                                <th class="border px-4 py-2 text-center">วันที่จบการแข่งขัน</th>
                            </tr>
                        </thead>
                        <tbody id="competitionTableBody">
                            @if ($dataList->count() > 0)
                                @foreach ($dataList as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->competition_name }}</td>
                                        <td class="border px-4 py-2 text-center">{{ $item->competition_amount }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            @php
                                                $teamCountFound = false;
                                            @endphp
                                            @foreach ($count_teams as $count)
                                                @if ($count->cl_id == $item->id)
                                                    {{ $count->team_count }}
                                                    @php
                                                        $teamCountFound = true;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="border px-4 py-2 text-center">{{ $item->amount_contestant }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            {{ \Carbon\Carbon::parse($item->competition_end_date)->format('d') }}
                                            {{ \Carbon\Carbon::parse($item->competition_end_date)->locale('th')->monthName }}
                                            {{ \Carbon\Carbon::parse($item->competition_end_date)->year + 543 }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="border px-4 py-2 text-center" colspan="5">ไม่พบข้อมูล</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4">
                        {{ $dataList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    document.getElementById('listType').addEventListener('change', function() {
        var selectedList = this.value;
        document.getElementById('pdfListType').value = selectedList;
        switch (selectedList) {
            case 'all':
                showAllCompetitions();
                break;
            case 'ongoing':
                showOngoingCompetitions();
                break;
            case 'ended':
                showEndedCompetitions();
                break;
            default:
                break;
        }
    });

    function showAllCompetitions() {
        document.getElementById('competitionTableBody').innerHTML = `
        @if ($dataList->count() > 0)
        @foreach ($dataList as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->competition_name }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->competition_amount }}</td>
                <td class="border px-4 py-2 text-center">
                    @foreach ($count_teams as $count)
                        @if ($count->cl_id == $item->id)
                            {{ $count->team_count }}
                        @endif
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">{{ $item->amount_contestant }}</td>
                <td class="border px-4 py-2 text-center">
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->format('d') }}
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->locale('th')->monthName }}
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->year + 543 }}
                </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td class="border px-4 py-2 text-center" colspan="5">ไม่พบข้อมูล</td>
        </tr>
    @endif
        `;
    }

    function showOngoingCompetitions() {
        document.getElementById('competitionTableBody').innerHTML = `
        @if ($dataList_ongoing->count() > 0)
        @foreach ($dataList_ongoing as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->competition_name }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->competition_amount }}</td>
                <td class="border px-4 py-2 text-center">
                    @foreach ($count_teams as $count)
                        @if ($count->cl_id == $item->id)
                            {{ $count->team_count }}
                        @endif
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">{{ $item->amount_contestant }}</td>
                <td class="border px-4 py-2 text-center">
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->format('d') }}
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->locale('th')->monthName }}
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->year + 543 }}
                </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td class="border px-4 py-2 text-center" colspan="5">ไม่พบข้อมูล</td>
        </tr>
    @endif
        `;
    }

    function showEndedCompetitions() {
        document.getElementById('competitionTableBody').innerHTML = `
    @if ($dataList_ended->count() > 0)
        @foreach ($dataList_ended as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->competition_name }}</td>
                <td class="border px-4 py-2 text-center">{{ $item->competition_amount }}</td>
                <td class="border px-4 py-2 text-center">
                    @foreach ($count_teams as $count)
                        @if ($count->cl_id == $item->id)
                            {{ $count->team_count }}
                        @endif
                    @endforeach
                </td>
                <td class="border px-4 py-2 text-center">{{ $item->amount_contestant }}</td>
                <td class="border px-4 py-2 text-center">
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->format('d') }}
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->locale('th')->monthName }}
                    {{ \Carbon\Carbon::parse($item->competition_end_date)->year + 543 }}
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td class="border px-4 py-2 text-center" colspan="5">ไม่พบข้อมูล</td>
        </tr>
    @endif
`;
    }
</script>
