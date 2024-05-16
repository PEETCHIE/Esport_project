<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('ตารางการแข่งขัน') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Navbar -->
                <div class="flex flex-nowrap border-b border-gray-200 dark:border-gray-600">
                    <div class="p-4">
                        <a href="#tab1" class="text-gray-900 dark:text-white font-bold">ตารางแข่งขัน</a>
                    </div>
                    <div class="p-4">
                        <a href="#tab2" class="text-gray-500 dark:text-gray-400 font-bold">ทีมเข้าแข่งขัน</a>
                    </div>
                    <div class="p-4">
                        <a href="#tab3" class="text-gray-500 dark:text-gray-400 font-bold">แมตซ์การแข่งขัน</a>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-4">
                    <!-- Content for Tab 2 -->
                    <div id="tab2" class="hidden tab-content">
                        <div
                            class="grid grid-cols-5 grid-flow-row dark:text-gray-200 leading-tight grid-md flex flex-wrap">
                            @foreach ($team_lists as $team_list)
                                <div class="mx-auto px-5 justify-center m-3">
                                   <div class="max-w-xs cursor-pointer rounded-lg p-2 shadow duration-150 hover:scale-105 hover:shadow-md"
                                        style="background-image: url(/asset/img/Bg-ll.png); background-size: cover; background-position: center;">
                                        <img class="h-40 w-52 rounded-lg object-cover object-center"
                                            src="{{ $team_list->logo }}" alt="product" />
                                        <p class="my-4 pl-4 font-bold text-white">ชื่อทีม: {{ $team_list->t_name }}</p>
                                        <button type="submit"
                                            class="bg-[#6495ED] hover:bg-gray-700 text-white font-bold py-1 px-1 rounded w-[200px]"><a
                                            href="{{ route('team_detail', $team_list->id) }}">รายละเอียด</a></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Content for Tab 3 -->
                    <div id="tab1" class="tab-content">
                        <div class="grid grid-cols-5 grid-flow-row dark:text-gray-200 leading-tight grid-md flex flex-wrap">
                            <div class="ml-[60px]">
                            <div class="relative overflow-x-auto shadow-md w-[1300px]">
                                <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                                    <thead class="text-[15px] text-white uppercase bg-rose-700 dark:text-white text-center">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                รอบ
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                วัน-เวลา
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                คู่แข่งขัน
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                คะแนน
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                ข้อมูล
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buckets as $bucket)
                                            @php
                                                $printedMatch = false;
                                            @endphp
                                            @foreach ($bucket['R1'] as $item)
                                                @if ($item->matches && !$printedMatch)
                                                    <tr class="bg-[#01142E] border-b border-blue-400 text-center">
                                                        <td class="px-6 py-4">
                                                            @if($item->competition_amount == 8)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R3')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 16)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R4')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 32)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    ROUND3
                                                                @elseif ($item->round == 'R4')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R5')
                                                                    Final
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($item->match_date . ' ' . $item->match_time)->timezone('Asia/Bangkok')->locale('th_TH')->isoFormat('ddd D MMM YY, HH:mm') }}
                                                        </td>
                                                        <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                                            @foreach ($bucket['R1'] as $team)
                                                                @if ($item->matches && $team->t_id != $item->t_id)
                                                                <div class="flex items-center justify-center">
                                                                    {{ $item->t_name }} <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $item->logo }}"> 
                                                                    <div class="flex">
                                                                        <span class="text-red-500 font-bold">V</span>
                                                                        <span class="text-blue-500 font-bold">S</span>
                                                                    </div> 
                                                                    <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $team->logo }}"> {{ $team->t_name }}
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @foreach ($bucket['R1'] as $team)
                                                                @if ($team->t_id != $item->t_id)
                                                                    {{ $item->score }} : {{ $team->score }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $printedMatch = true; 
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach

                                        @foreach ($buckets as $bucket)
                                            @php
                                                $printedMatch = false;
                                            @endphp
                                            @foreach ($bucket['R2'] as $item)
                                                @if ($item->matches && !$printedMatch)
                                                    <tr class="bg-[#01142E] border-b border-blue-400 text-center">
                                                        <td class="px-6 py-4">
                                                        @if($item->competition_amount == 8)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R3')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 16)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R4')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 32)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    ROUND3
                                                                @elseif ($item->round == 'R4')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R5')
                                                                    Final
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($item->match_date . ' ' . $item->match_time)->timezone('Asia/Bangkok')->locale('th_TH')->isoFormat('ddd D MMM YY, HH:mm') }}
                                                        </td>
                                                        <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                                            @foreach ($bucket['R2'] as $team)
                                                                @if ($item->matches && $team->t_id != $item->t_id)
                                                                <div class="flex items-center justify-center">
                                                                    {{ $item->t_name }} <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $item->logo }}"> 
                                                                    <div class="flex">
                                                                        <span class="text-red-500 font-bold">V</span>
                                                                        <span class="text-blue-500 font-bold">S</span>
                                                                    </div> 
                                                                    <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $team->logo }}"> {{ $team->t_name }}
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @foreach ($bucket['R2'] as $team)
                                                                @if ($team->t_id != $item->t_id)
                                                                    {{ $item->score }} : {{ $team->score }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $printedMatch = true; 
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach
                                        
                                        @foreach ($buckets as $bucket)
                                            @php
                                                $printedMatch = false;
                                            @endphp
                                            @foreach ($bucket['R3'] as $item)
                                                @if ($item->matches && !$printedMatch)
                                                    <tr class="bg-[#01142E] border-b border-blue-400 text-center">
                                                        <td class="px-6 py-4">
                                                        @if($item->competition_amount == 8)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R3')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 16)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R4')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 32)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    ROUND3
                                                                @elseif ($item->round == 'R4')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R5')
                                                                    Final
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($item->match_date . ' ' . $item->match_time)->timezone('Asia/Bangkok')->locale('th_TH')->isoFormat('ddd D MMM YY, HH:mm') }}
                                                        </td>
                                                        <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                                            @foreach ($bucket['R3'] as $team)
                                                                @if ($item->matches && $team->t_id != $item->t_id)
                                                                <div class="flex items-center justify-center">
                                                                    {{ $item->t_name }} <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $item->logo }}"> 
                                                                    <div class="flex">
                                                                        <span class="text-red-500 font-bold">V</span>
                                                                        <span class="text-blue-500 font-bold">S</span>
                                                                    </div> 
                                                                    <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $team->logo }}"> {{ $team->t_name }}
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @foreach ($bucket['R3'] as $team)
                                                                @if ($team->t_id != $item->t_id)
                                                                    {{ $item->score }} : {{ $team->score }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $printedMatch = true; 
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach

                                        @foreach ($buckets as $bucket)
                                            @php
                                                $printedMatch = false;
                                            @endphp
                                            @foreach ($bucket['R4'] as $item)
                                                @if ($item->matches && !$printedMatch)
                                                    <tr class="bg-[#01142E] border-b border-blue-400 text-center">
                                                        <td class="px-6 py-4">
                                                        @if($item->competition_amount == 8)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R3')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 16)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R4')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 32)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    ROUND3
                                                                @elseif ($item->round == 'R4')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R5')
                                                                    Final
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($item->match_date . ' ' . $item->match_time)->timezone('Asia/Bangkok')->locale('th_TH')->isoFormat('ddd D MMM YY, HH:mm') }}
                                                        </td>
                                                        <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                                            @foreach ($bucket['R4'] as $team)
                                                                @if ($item->matches && $team->t_id != $item->t_id)
                                                                <div class="flex items-center justify-center">
                                                                    {{ $item->t_name }} <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $item->logo }}"> 
                                                                    <div class="flex">
                                                                        <span class="text-red-500 font-bold">V</span>
                                                                        <span class="text-blue-500 font-bold">S</span>
                                                                    </div> 
                                                                    <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $team->logo }}"> {{ $team->t_name }}
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @foreach ($bucket['R4'] as $team)
                                                                @if ($team->t_id != $item->t_id)
                                                                    {{ $item->score }} : {{ $team->score }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $printedMatch = true; 
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach

                                        @foreach ($buckets as $bucket)
                                            @php
                                                $printedMatch = false;
                                            @endphp
                                            @foreach ($bucket['R5'] as $item)
                                                @if ($item->matches && !$printedMatch)
                                                    <tr class="bg-[#01142E] border-b border-blue-400 text-center">
                                                        <td class="px-6 py-4">
                                                        @if($item->competition_amount == 8)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R3')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 16)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R4')
                                                                    Final
                                                                @endif
                                                            @elseif($item->competition_amount == 32)
                                                                @if ($item->round == 'R1')
                                                                    ROUND1
                                                                @elseif ($item->round == 'R2')
                                                                    ROUND2
                                                                @elseif ($item->round == 'R3')
                                                                    ROUND3
                                                                @elseif ($item->round == 'R4')
                                                                    Semi Final
                                                                @elseif ($item->round == 'R5')
                                                                    Final
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            {{ \Carbon\Carbon::parse($item->match_date . ' ' . $item->match_time)->timezone('Asia/Bangkok')->locale('th_TH')->isoFormat('ddd D MMM YY, HH:mm') }}
                                                        </td>
                                                        <td scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                                            @foreach ($bucket['R5'] as $team)
                                                                @if ($item->matches && $team->t_id != $item->t_id)
                                                                <div class="flex items-center justify-center">
                                                                    {{ $item->t_name }} <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $item->logo }}"> 
                                                                    <div class="flex">
                                                                        <span class="text-red-500 font-bold">V</span>
                                                                        <span class="text-blue-500 font-bold">S</span>
                                                                    </div> 
                                                                    <img class="rounded-full w-[45px] h-[40px] mx-1" src="{{ $team->logo }}"> {{ $team->t_name }}
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @foreach ($bucket['R5'] as $team)
                                                                @if ($team->t_id != $item->t_id)
                                                                    {{ $item->score }} : {{ $team->score }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $printedMatch = true; 
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content for Tab 1 -->
                    <div id="tab3" class=" hidden tab-content">
                    @foreach ($buckets as $bucket)
                        @if ($loop->first)
                            @foreach ($bucket['R1'] as $item)
                                    @if ($item->competition_amount == 32)
                                    <div class="flex">
                                        <h1 class="ml-[80px]">ROUND 1</h1>
                                        <h1 class="ml-[220px]">ROUND 2</h1>
                                        <h1 class="ml-[220px]">ROUND 3</h1>
                                        <h1 class="ml-[210px]">Semi Final</h1>
                                        <h1 class="ml-[230px]">Final</h1>
                                    </div>
                                    @endif
                                    @break
                            @endforeach
                        @endif
                    @endforeach
                    @foreach ($buckets as $bucket)
                        @if ($loop->first)
                            @foreach ($bucket['R1'] as $item)
                                    @if ($item->competition_amount == 16)
                                    <div class="flex">
                                        <h1 class="ml-[80px]">ROUND 1</h1>
                                        <h1 class="ml-[220px]">ROUND 2</h1>
                                        <h1 class="ml-[210px]">Semi Final</h1>
                                        <h1 class="ml-[230px]">Final</h1>
                                    </div>
                                    @endif
                                    @break
                            @endforeach
                        @endif
                    @endforeach
                    @foreach ($buckets as $bucket)
                        @if ($loop->first)
                            @foreach ($bucket['R1'] as $item)
                                    @if ($item->competition_amount == 8)
                                    <div class="flex">
                                        <h1 class="ml-[80px]">ROUND 1</h1>
                                        <h1 class="ml-[220px]">Semi Final</h1>
                                        <h1 class="ml-[230px]">Final</h1>
                                    </div>
                                    @endif
                                    @break
                            @endforeach
                        @endif
                    @endforeach
                        <div class="grid grid-cols-5 gap-1">
                            <div>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3">
                                        @foreach ($bucket['R1'] as $item)
                                            <br>
                                            <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                                                <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[70px] -translate-y-[59px]">
                                                    <div class="flex">
                                                        <span class="text-red-500 font-bold">V</span>
                                                        <span class="text-blue-500 font-bold">S</span>
                                                    </div>
                                                </div>
                                                <div class="absolute transform translate-x-[-30px] -translate-y-[64px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <div>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[58px]">
                                        @foreach ($bucket['R2'] as $item)
                                            <br>
                                            <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                                                <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[70px] -translate-y-[59px]">
                                                    <div class="flex">
                                                        <span class="text-red-500 font-bold">V</span>
                                                        <span class="text-blue-500 font-bold">S</span>
                                                    </div>
                                                </div>
                                                <div class="absolute transform translate-x-[-30px] -translate-y-[64px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[145px]">
                                        @foreach ($bucket['R3'] as $item)
                                            <br>
                                            @switch($item->cl_round)
                                            @case('1')
                                                @if ($item->competition_amount == 8)
                                                    @if ($item->score == 1)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 1) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @case('3')
                                                @if ($item->competition_amount == 8)
                                                    @if ($item->score == 2)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 2) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @case('5')
                                                @if ($item->competition_amount == 8)
                                                    @if ($item->score == 3)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 3) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @endswitch        
                                                    <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                                                    <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                                                    <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                        {{ $item->score }}
                                                    </div>
                                                </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[70px] -translate-y-[59px]">
                                                    <div class="flex">
                                                        <span class="text-red-500 font-bold">V</span>
                                                        <span class="text-blue-500 font-bold">S</span>
                                                    </div>
                                                </div>
                                                <div class="absolute transform translate-x-[-30px] -translate-y-[64px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                @foreach ($buckets as $bucket)
                                @if ($item->competition_amount > 8)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[270px]">
                                        @foreach ($bucket['R4'] as $item)
                                            <br>
                                            @switch($item->cl_round)
                                            @case('1')
                                                @if ($item->competition_amount == 16)
                                                    @if ($item->score == 1)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 1) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @case('3')
                                                @if ($item->competition_amount == 16)
                                                    @if ($item->score == 2)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 2) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @case('5')
                                                @if ($item->competition_amount == 16)
                                                    @if ($item->score == 3)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 3) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @endswitch       
                                                <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                                                <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[70px] -translate-y-[59px]">
                                                    <div class="flex">
                                                        <span class="text-red-500 font-bold">V</span>
                                                        <span class="text-blue-500 font-bold">S</span>
                                                    </div>
                                                </div>
                                                <div class="absolute transform translate-x-[-30px] -translate-y-[64px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <div>
                                @foreach ($buckets as $bucket)
                                @if ($item->competition_amount > 16)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[470px]">
                                        @foreach ($bucket['R5'] as $item)
                                            <br>
                                            @switch($item->cl_round)
                                            @case('1')
                                                @if ($item->competition_amount == 32)
                                                    @if ($item->score == 1)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 1) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @case('3')
                                                @if ($item->competition_amount == 32)
                                                    @if ($item->score == 2)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 2) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @case('5')
                                                @if ($item->competition_amount == 32)
                                                    @if ($item->score == 3)
                                                        <img src="https://avatars.githubusercontent.com/u/108270321?v=4" class="object-cover w-6 h-6 rounded-md mt-[-15px]">
                                                    @endif
                                                    <div class="border-2 ring-2  @if ($item->score == 3) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @else
                                                    <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                                                @endif 
                                            @break
                                            @endswitch       
                                                <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                                                <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[70px] -translate-y-[59px]">
                                                    <div class="flex">
                                                        <span class="text-red-500 font-bold">V</span>
                                                        <span class="text-blue-500 font-bold">S</span>
                                                    </div>
                                                </div>
                                                <div class="absolute transform translate-x-[-30px] -translate-y-[64px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--ButtonLink-->
    <script>
        function Link(cp_id_t_id, url) {
        // Split cp_id_t_id into cp_id and t_id
        var cp_id_t_id_arr = cp_id_t_id.split('-');
        var cp_id = cp_id_t_id_arr[0];
        var t_id = cp_id_t_id_arr[1];
        
        // Check if the URL is defined
        if (url) {
            // Open the URL in a new tab
            window.open(url, '_blank');
        } else {
            // If the URL is not defined, display a message
            // swal("ยังไม่มีลิ้งค์ถ่ายทอดสด");
            Swal.fire({
                title: "ยังไม่มีลิ้งค์ถ่ายทอดสด...",
                width: 600,
                padding: "3em",
                color: "#ffff",
                background: "#38B6FF",
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("/asset/img/XOsX.gif")
                    left
                    no-repeat
                `,
                confirmButtonColor: 'green',
                });
        }
    }
    </script>

    <!--TabBar-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // เลือกทุกลิงก์ของแท็บ
            const tabLinks = document.querySelectorAll('.flex .p-4 a');

            // ฟังก์ชันสำหรับการเปิดแท็บ
            function openTab(e) {
                e.preventDefault();
                const tabId = this.getAttribute('href').replace('#', '');
                const tabContent = document.getElementById(tabId);

                // ปิดแท็บทั้งหมด
                document.querySelectorAll('.tab-content').forEach(function(tab) {
                    tab.classList.add('hidden');
                });

                // เปิดแท็บที่ถูกคลิก
                tabContent.classList.remove('hidden');
            }

            // ฟังก์ชันสำหรับเปลี่ยนสีของแท็บ
            function changeTabColor(tab) {
                tabLinks.forEach(function(link) {
                    link.style.color = tab === link ? '#000' : '#555'; // ถ้าแท็บที่ถูกคลิกให้เป็นสีดำ ไม่เช่นนั้นให้เป็นสีดำอ่อน
                });
            }

            // ฟังก์ชันสำหรับการเปิดแท็บ
            function openTab(e) {
                e.preventDefault();
                const tabId = this.getAttribute('href').replace('#', '');
                const tabContent = document.getElementById(tabId);

                // ปิดแท็บทั้งหมด
                document.querySelectorAll('.tab-content').forEach(function(tab) {
                    tab.classList.add('hidden');
                });

                // เปิดแท็บที่ถูกคลิก
                tabContent.classList.remove('hidden');

                // เรียกใช้งานฟังก์ชันเปลี่ยนสีแท็บ
                changeTabColor(this);
            }

            // แนบการคลิกไปยังทุกลิงก์ของแท็บ
            tabLinks.forEach(function(link) {
                link.addEventListener('click', openTab);
            });
        });
    </script>
</x-app-layout>
