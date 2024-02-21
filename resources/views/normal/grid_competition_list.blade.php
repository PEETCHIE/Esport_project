<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('ลงทะเบียนผู้เข้าแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-4 grid-flow-row dark:text-gray-200 leading-tight grid-md flex flex-wrap ">
                    @foreach ($competition_lists as $competition_list)
                        <?php
                        $count_clid = count($competition_lists);
                        $competitionAmountInt = $competition_list->competition_amount;
                    ?>
                    <div class="mx-auto px-5 justify-center m-3">
                        <div class="max-w-xs cursor-pointer rounded-lg bg-[#C9193A]  p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
                            <img class="h-40 w-60 mx-auto rounded-lg object-cover object-center mb-2" src="{{ $competition_list->cl_img}}" alt="product" />
                            <p class="my-4 pl-4 my-px font-bold text-white">ชื่อรายการแข่งขัน : {{ $competition_list->competition_name}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white">เกม : {{ $competition_list->game_name}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white">วันที่เริ่มแข่งขัน : {{ $competition_list->start_date}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white">วันที่สิ้นสุดการแข่งขัน : {{ $competition_list->competition_end_date}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white mb-1.5">จำนวนทีมที่รับสมัคร : {{ $competition_list->competition_amount}} ทีม</p>
                        <div class="mx-auto mx-12">
                            <!-- <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded m-1">รายละเอียด</button> -->
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded m-1"><a href="{{ route('competition.detail', $competition_list->id)}}">รายละเอียด</a></button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded "><a href="{{ route('team_grid', $competition_list->id) }}">ทีมที่เข้าร่วม</a></button>
                        </div>
                        </div>
                    </div>
                @endforeach            
                </div>
            </div>
        </div>
    </div>

       
</x-app-layout>
