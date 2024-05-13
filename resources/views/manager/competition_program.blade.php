<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-[20px]">
            {{ __('จัดการตารางข้อมูลการแข่งขัน') }}
        </h2>
    </x-slot>
    <div class="Round">
    @foreach ($buckets as $bucket)
        @if ($loop->first)
            @foreach ($bucket['R1'] as $item)
                @if ($item->competition_amount == 8)
                    <div class="flex">
                        <h1 class="ml-[110px] text-white">ROUND 1</h1>
                        <h1 class="ml-[235px] text-white">Semi Final</h1>
                        <h1 class="ml-[230px] text-white">Final</h1>
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
                        <h1 class="ml-[110px] text-white">ROUND 1</h1>
                        <h1 class="ml-[235px] text-white">ROUND 2</h1>
                        <h1 class="ml-[230px] text-white">Semi Final</h1>
                        <h1 class="ml-[230px] text-white">Final</h1>
                    </div>
                @endif
                @break
            @endforeach
        @endif
    @endforeach
    @foreach ($buckets as $bucket)
        @if ($loop->first)
            @foreach ($bucket['R1'] as $item)
                @if ($item->competition_amount == 32)
                    <div class="flex">
                        <h1 class="ml-[110px] text-white">ROUND 1</h1>
                        <h1 class="ml-[235px] text-white">ROUND 2</h1>
                        <h1 class="ml-[235px] text-white">ROUND 3</h1>
                        <h1 class="ml-[220px] text-white">Semi Final</h1>
                        <h1 class="ml-[230px] text-white">Final</h1>
                    </div>
                @endif
                @break
            @endforeach
        @endif
    @endforeach
    <div class="grid grid-cols-5 gap-1 bg-[#f0f0f0] rounded m-2 p-6 mt-[5px]">
        <div class="cols">
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-36 grid-cols-4 gap-4">
                    @foreach ($bucket['R1'] as $item)
                        <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                            <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                            <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                            <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                {{ $item->score }}
                            </div>
                        </div>
                        <div class="absolute transform -translate-x-[25px] -translate-y-[32px]">
                            <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                คะแนน
                            </button>
                        </div>
                        <br>
                    @endforeach
                    <div class="absolute transform translate-x-[30px] -translate-y-[85px]">
                        <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                    <div class="absolute transform translate-x-[70px] -translate-y-[85px]">
                        <div class="flex">
                            <span class="text-red-500 font-bold">V</span>
                            <span class="text-blue-500 font-bold">S</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cols ml-[10px]">
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-36 grid-cols-4 gap-4 mt-[58px]">
                    @foreach ($bucket['R2'] as $index => $item)
                        <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                            <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                            <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                            <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                {{ $item->score }}
                            </div>
                        </div>
                        <div class="absolute transform -translate-x-[25px] -translate-y-[32px]">
                            <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                คะแนน
                            </button>
                        </div>
                        <br>
                    @if ($index % 2 == 1)
                    <div class="absolute transform translate-x-[30px] -translate-y-[85px]">
                        <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                    <div class="absolute transform translate-x-[70px] -translate-y-[85px]">
                        <div class="flex">
                            <span class="text-red-500 font-bold">V</span>
                            <span class="text-blue-500 font-bold">S</span>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            @endforeach
            <div class="flex justify-center mt-48">
                <form action="{{ route('randomizeBlindR3', $item->cp_id) }}" method="GET">
                    <button
                        type="submit"class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 rounded">ทีมสุ่ม</button>
                </form>
            </div>
        </div>

        <div class="cols ml-[10px]">
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-36 grid-cols-4 gap-4 mt-[145px]">
                    @foreach ($bucket['R3'] as $index => $item)
                    @if ($item->competition_amount == 8)
                        <div class="border-2 ring-2  @if ($item->score > 0) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif
                            text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                    @else
                        <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                    @endif       
                            <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                            <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                            <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                {{ $item->score }}
                            </div>
                        </div>
                        <div class="absolute transform -translate-x-[25px] -translate-y-[32px]">
                            <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                คะแนน
                            </button>
                        </div>
                        <br>
                    @if ($index % 2 == 1)
                    <div class="absolute transform translate-x-[30px] -translate-y-[85px]">
                        <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                    <div class="absolute transform translate-x-[70px] -translate-y-[85px]">
                        <div class="flex">
                            <span class="text-red-500 font-bold">V</span>
                            <span class="text-blue-500 font-bold">S</span>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            @endforeach
            <div class="flex justify-center mt-48">
                <form action="{{ route('randomizeBlindR3', $item->cp_id) }}" method="GET">
                    <button
                        type="submit"class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 rounded">ทีมสุ่ม</button>
                </form>
            </div>
        </div>
        <div class="cols ml-[10px]">
            @foreach ($buckets as $bucket)
                @if ($item->competition_amount > 8)
                    <div class="mx-8 w-36 grid-cols-4 gap-4 mt-[270px]">
                        @foreach ($bucket['R4'] as $index => $item)
                        @if ($item->competition_amount == 16)
                            <div class="border-2 ring-2  @if ($item->score > 0) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif
                                text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                        @else
                            <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                        @endif       
                                <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                                <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                    {{ $item->score }}
                                </div>
                            </div>
                            <div class="absolute transform -translate-x-[25px] -translate-y-[32px]">
                                <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                    class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                    คะแนน
                                </button>
                            </div>
                            <br>
                        @if ($index % 2 == 1)
                        <div class="absolute transform translate-x-[30px] -translate-y-[85px]">
                            <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                แก้ไข
                            </button>
                        </div>
                        <div class="absolute transform translate-x-[70px] -translate-y-[85px]">
                            <div class="flex">
                                <span class="text-red-500 font-bold">V</span>
                                <span class="text-blue-500 font-bold">S</span>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                @endif
            @endforeach
            <div class="flex justify-center mt-48">
                <form action="{{ route('randomizeBlindR3', $item->cp_id) }}" method="GET">
                    <button
                        type="submit"class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 rounded">ทีมสุ่ม</button>
                </form>
            </div>
        </div>
        <div class="cols -ml-[10px]">
            @foreach ($buckets as $bucket)
                @if ($item->competition_amount > 16)
                    <div class="mx-8 w-36 grid-cols-4 gap-4 mt-[470px]">
                    @foreach ($bucket['R5'] as $index => $item)
                        @if ($item->competition_amount == 32)
                            <div class="border-2 ring-2  @if ($item->score > 0) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif
                                text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                        @else
                            <div class="border-2 ring-2 bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-4 gap-2 relative h-[35px] w-[165px] overflow-hidden">
                        @endif       
                                <span class="flex justify-start  p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                                <img class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[80px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;" src="{{ $item->logo }}">
                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                    {{ $item->score }}
                                </div>
                            </div>
                            <div class="absolute transform -translate-x-[25px] -translate-y-[32px]">
                                <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                    class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                    คะแนน
                                </button>
                            </div>
                            <br>
                        @if ($index % 2 == 1)
                        <div class="absolute transform translate-x-[30px] -translate-y-[85px]">
                            <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                แก้ไข
                            </button>
                        </div>
                        <div class="absolute transform translate-x-[70px] -translate-y-[85px]">
                            <div class="flex">
                                <span class="text-red-500 font-bold">V</span>
                                <span class="text-blue-500 font-bold">S</span>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                @endif
            @endforeach
        </div>

        <!-- <div class="cols">
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-36 grid-cols-4 gap-3">
                    @foreach ($bucket['R1'] as $item)
                        <br>
                        <div
                            class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                            <span class="flex justify-start p-1 text-white text-[12px] whitespace-nowrap">{{ $item->t_name }}</span>
                            <div class="relative">
                                <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[10px]"
                                    style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                            </div>
                            <div class="p-1 shrink-0">
                                <div class="relative inset-y-0 left-[9px]">
                                    <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                </div>
                            </div>
                            <div
                                class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                {{ $item->score }}
                            </div>
                        </div>
                        <div class="absolute transform -translate-x-[48px] -translate-y-[28px]">
                            <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                คะแนน
                            </button>
                        </div>
                    @endforeach
                    <div class="absolute transform translate-x-[14px] -translate-y-[54px]">
                        <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                    <div class="absolute transform translate-x-[53px] -translate-y-[52px]">
                        <div>VS</div>
                    </div>
                </div>
            @endforeach
        </div> -->

        <!-- <div class="cols">
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[58px]">
                    @foreach ($bucket['R2'] as $index => $item)
                        <br>
                        <div
                            class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                            <span class="flex justify-start p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                            <div class="relative">
                                <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[10px]"
                                    style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                            </div>
                            <div class="p-1 shrink-0">
                                <div class="relative inset-y-0 left-[9px]">
                                    <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                </div>
                            </div>
                            <div
                                class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                {{ $item->score }}
                            </div>
                        </div>
                        <div class="absolute transform -translate-x-[48px] -translate-y-[32px]">
                            <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                คะแนน
                            </button>
                        </div>
                        @if ($index % 2 == 1)
                            <div class="absolute transform translate-x-[14px] -translate-y-[54px]">
                                <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                                    class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                    แก้ไข
                                </button>
                            </div>
                            <div class="absolute transform translate-x-[55px] -translate-y-[56px]">
                                <div>VS</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            <div class="flex justify-center mt-48">
                <form action="{{ route('randomizeBlindR3', $item->cp_id) }}" method="GET">
                    <button
                        type="submit"class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 rounded">ทีมสุ่ม</button>
                </form>
            </div>
        </div> -->

        <!-- <div class="cols">
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[145px]">
                    @foreach ($bucket['R3'] as $index => $item)
                        <br>
                        @if ($item->competition_amount == 8)
                            <div
                                class="border
                                @if ($item->score > 0) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif
                                text-white flex justify-between grid-cols-3 gap-2">
                            @else
                                <div
                                    class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                        @endif
                        <span class="flex justify-start p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                        <div class="relative">
                            <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[10px]"
                                style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                        </div>
                        <div class="p-1 shrink-0">
                            <div class="relative inset-y-0 left-[9px]">
                                <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                            </div>
                        </div>
                        <div
                            class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                            {{ $item->score }}
                        </div>
                </div>
                <div class="absolute transform -translate-x-[48px] -translate-y-[32px]">
                    <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                        class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                        คะแนน
                    </button>
                </div>
                @if ($index % 2 == 1)
                    <div class="absolute transform translate-x-[14px] -translate-y-[54px]">
                        <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                    <div class="absolute transform translate-x-[55px] -translate-y-[56px]">
                        <div>VS</div>
                    </div>
                @endif
            @endforeach
        </div>
        @endforeach
        <div class="flex justify-center mt-48">
            <form action="{{ route('randomizeBlindR3', $item->cp_id) }}" method="GET">
                <button
                    type="submit"class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 rounded">ทีมสุ่ม</button>
            </form>
        </div>
    </div> -->

    <!-- <div class="cols">
        @foreach ($buckets as $bucket)
            @if ($item->competition_amount > 8)
                <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[270px]">
                    @foreach ($bucket['R4'] as $index => $item)
                        <br>
                        @if ($item->competition_amount == 16)
                            <div
                                class="border
                                @if ($item->score > 0) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif
                                text-white flex justify-between grid-cols-3 gap-2">
                            @else
                                <div
                                    class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                        @endif
                        <span class="flex justify-start p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                        <div class="relative">
                            <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[10px]"
                                style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                        </div>
                        <div class="p-1 shrink-0">
                            <div class="relative inset-y-0 left-[9px]">
                                <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                            </div>
                        </div>
                        <div
                            class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                            {{ $item->score }}
                        </div>
                </div>
                <div class="absolute transform -translate-x-[48px] -translate-y-[32px]">
                    <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                        class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                        คะแนน
                    </button>
                </div>
                @if ($index % 2 == 1)
                    <div class="absolute transform translate-x-[14px] -translate-y-[54px]">
                        <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                    <div class="absolute transform translate-x-[55px] -translate-y-[56px]">
                        <div>VS</div>
                    </div>
                @endif
            @endforeach
    </div>
    @endif
    @endforeach
    <div class="flex justify-center mt-48">
        <form action="{{ route('randomizeBlindR3', $item->cp_id) }}" method="GET">
            <button
                type="submit"class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-1 px-2 rounded">ทีมสุ่ม</button>
        </form>
    </div>
    </div> -->

    <!-- <div class="cols">
        @foreach ($buckets as $bucket)
            @if ($item->competition_amount > 16)
                <div class="mx-8 w-36 grid-cols-4 gap-3 mt-[470px]">
                    @foreach ($bucket['R5'] as $item)
                        <br>
                        @if (count($bucket['R5']) == 2)
                            <div
                                class="border
                                @if ($item->score > 0) bg-yellow-500 @else bg-gradient-to-r from-slate-800 to-slate-300 @endif
                                text-white flex justify-between grid-cols-3 gap-2">
                            @else
                                <div
                                    class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                        @endif
                        <span class="flex justify-start p-1 text-white text-[12px]">{{ $item->t_name }}</span>
                        <div class="relative">
                            <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[10px]"
                                style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                        </div>
                        <div class="p-1 shrink-0">
                            <div class="relative inset-y-0 left-[9px]">
                                <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                            </div>
                        </div>
                        <div
                            class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                            {{ $item->score }}
                        </div>
                </div>
                <div class="absolute transform -translate-x-[48px] -translate-y-[28px]">
                    <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                        class="px-2 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                        คะแนน
                    </button>
                </div>
            @endforeach
            @if (count($bucket['R5']) > 1)
                <div class="absolute transform translate-x-[14px] -translate-y-[54px]">
                    <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')"
                        class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                        แก้ไข
                    </button>
                </div>
                <div class="absolute transform translate-x-[53px] -translate-y-[52px]">
                    <div>VS</div>
                </div>
            @endif
    </div>
    @endif
    @endforeach
    </div> -->
    </div>
    </div>

</x-app-layout>

<!--Team&Score-->
@foreach ($buckets as $bucket)
    @foreach ($bucket as $innerBucket)
        @foreach ($innerBucket as $item)
            <div id="score-modal-{{ $item->cp_id }}-{{ $item->t_id }}"
                class="modal-content hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg w-1/2 md:w-1/3 p-4 md:p-5 space-y-4 relative">
                    <button onclick="closeModal()"
                        class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 w-[50px] h-[50px]">
                        &times;
                    </button>
                    <form id="update-form-{{ $item->cp_id }}-{{ $item->t_id }}"
                        action="{{ route('update_competition_program', $item->cp_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <p class="text-lg font-bold">คะแนน</p>
                        <hr>
                        <div class="p-4 md:p-3 space-y-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <label for="team">ทีม</label>
                                    <img src="{{ $item->logo }}" alt="{{ $item->t_name }}"
                                        class="w-10 h-10 mr-2">
                                    <span class="ml-2">{{ $item->t_name }}</span>
                                </div>
                                <button
                                    class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="{{ route('store', $item->t_id) }}">+1</a>
                                </button>
                                <button
                                    class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <a href="{{ route('minusScore', $item->t_id) }}">-1</a>
                                </button>
                                <span class="ml-2">คะแนน</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endforeach
@endforeach
<script>
    function openScoreModal(cp_id) {
        var modal = document.getElementById("score-modal-" + cp_id);
        modal.classList.remove("hidden");
    }

    function submitUpdateForm(cp_id) {
        var form = document.getElementById("update-form-" + cp_id);
        form.submit();
    }

    function closeModal() {
        var modal = document.querySelector(".modal-content:not(.hidden)");
        modal.classList.add("hidden");
    }
</script>

<!--Link&TimeDate-->
@foreach ($buckets as $bucket)
    @foreach ($bucket as $innerBucket)
        @foreach ($innerBucket as $item)
            <div id="edit-modal-{{ $item->cp_id }}-{{ $item->t_id }}"
                class="modal-content hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg w-1/2 md:w-1/3 p-4 md:p-5 space-y-4 relative">
                    <button onclick="closeModal()"
                        class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 w-[50px] h-[50px]">
                        &times;
                    </button>
                    <form id="update-form-Link-{{ $item->cp_id }}-{{ $item->t_id }}"
                        action="{{ route('update_competition_program', $item->cp_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <p class="text-lg font-bold">แก้ไขข้อมูล</p>
                        <hr>
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <label class="mx-auto">ลิ้งค์</label>
                                    <input type="text" name="link" value="{{ $item->link }}"
                                        class="w-[400px] bg-gray-50 border border-gray-300 ml-4">
                                </div>
                            </div>
                            <div class="flex justify-center items-center">
                                <label class="mx-auto">แก้ไขเวลา</label>
                                <input type="time" name="match_time" id="match_time"
                                    value="{{ $item->match_time }}"
                                    class="text-gray-500 hover:text-gray-700 h-5 mr-2 ml-2">
                                <label class="mx-auto">แก้ไขวันที่</label>
                                <input type="date" name="match_date" id="match_date"
                                    value="{{ $item->match_date }}"
                                    class="ml-4 text-gray-500 hover:text-gray-700 h-5">
                            </div>
                        </div>
                        <hr><br>
                        <div class="flex justify-center">
                            <button onclick="submitUpdateForm('{{ $item->cp_id }}')"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                อัพเดต
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endforeach
@endforeach
<script>
    function openEditModal(cp_id) {
        var modal = document.getElementById("edit-modal-" + cp_id);
        modal.classList.remove("hidden");
    }

    function submitUpdateForm(cp_id) {
        var form = document.getElementById("update-form-Link-" + cp_id);
        form.submit();
    }

    function closeModal() {
        var modal = document.querySelector(".modal-content:not(.hidden)");
        modal.classList.add("hidden");
    }

    @if (session('alert'))
        Swal.fire({
            icon: '{{ session('alert')['icon'] }}',
            title: '{{ session('alert')['title'] }}',
            text: '{{ session('alert')['text'] }}',
        });
    @endif
</script>
