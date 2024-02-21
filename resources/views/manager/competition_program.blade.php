<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('จัดการตารางข้อมูลการแข่งขัน') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-4 gap-1">
        <div>
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-48 grid-cols-4 gap-3">
                    @foreach ($bucket['R1'] as $item)
                        {{ $item->cp_id }}
                        <br>
                        <div
                            class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                            <div class="flex items-center justify-center mx-auto">
                                <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                <span class="ml-2">{{ $item->t_name }}</span>
                            </div>
                            <div class="border bg-white text-black flex items-center justify-center w-10">
                                0
                            </div>
                        </div>
                    @endforeach
                    <div class="absolute transform translate-x-1 -translate-y-[50px]">
                        <button onclick="openModal('{{ $item->cp_id }}')"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="absolute translate-x-[50px] translate-y-[130px]">
            <div class="border-t-[3px] w-[100px] -translate-y-[67px] translate-x-[249px]"></div>
            <div class="border-t-[3px] w-[100px]  translate-y-8 translate-x-[249px]"></div>
            <div class="border-r-[3px] h-[104px] -translate-y-[72px] translate-x-[250px]"></div>
            <div class="border-t-[3px] w-[25px] -translate-y-[125px] translate-x-[350px]"></div>
        </div>
        <div>
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-48 grid-cols-4 gap-3 mt-[55px]">
                    @foreach ($bucket['R2'] as $item)
                        {{ $item->cp_id }}
                        <br>
                        <div
                            class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                            <div class="flex items-center justify-center mx-auto">
                                <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                <span class="ml-2">{{ $item->t_name }}</span>
                            </div>
                            <div class="border bg-white text-black flex items-center justify-center w-10">
                                0
                            </div>
                        </div>
                        <div class="absolute transform translate-x-1 translate-y-[3px]">
                            <button onclick="openModal('{{ $item->cp_id }}')"
                                class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                แก้ไข
                            </button>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div>
            <div class="mx-8 w-48 grid-cols-4 gap-3">
                <div
                    class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                    <div class="flex items-center justify-center mx-auto">
                        <img src="#" class="w-5 h-5" alt="">
                        <span class="ml-2">round3</span>
                    </div>
                    <div class="border bg-white text-black flex items-center justify-center w-10">
                        0
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="mx-8 w-48 grid-cols-4 gap-3">
                <div
                    class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                    <div class="flex items-center justify-center mx-auto">
                        <img src="#" class="w-5 h-5" alt="">
                        <span class="ml-2">round4</span>
                    </div>
                    <div class="border bg-white text-black flex items-center justify-center w-10">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('manager.modals.modal_edit_program')
