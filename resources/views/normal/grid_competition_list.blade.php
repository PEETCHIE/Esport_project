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
                    <div class="mx-auto px-5 justify-center m-3">
                        <div class="max-w-xs cursor-pointer rounded-lg bg-[#C9193A]  p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
                            <img class="h-40 w-60 mx-auto rounded-lg object-cover object-center mb-2" src="{{ $competition_list->cl_img}}" alt="product" />
                            <p class="my-4 pl-4 my-px font-bold text-white">ชื่อรายการแข่งขัน : {{ $competition_list->competition_name}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white">เกม : {{ $competition_list->game_name}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white">วันที่เริ่มแข่งขัน : {{ $competition_list->start_date}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white">วันที่สิ้นสุดการแข่งขัน : {{ $competition_list->competition_end_date}}</p>
                            <p class="my-4 pl-4 my-px font-bold text-white mb-1.5">จำนวนทีมที่รับสมัคร : {{ $competition_list->competition_amount}} ทีม</p>
                        <center>
                        <div class="mx-auto">
                            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded m-1" onclick="openModal('{{ $competition_list->id }}')">รายละเอียด</button>
                            <!-- <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded m-1"><a href="{{ route('competition.detail', $competition_list->id)}}">รายละเอียด</a></button> -->
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded m-1"><a href="{{ route('team_grid', $competition_list->id) }}">ทีมที่เข้าร่วม</a></button>
                        </div>
                        </center>
                        </div>
                    </div>
                @endforeach            
                </div>
            </div>
        </div>
    </div>
@foreach($competition_lists as $competition_list)  
    @php
        $count_clid = DB::table('teams')->where('cl_id', $competition_list->id)->count();
        $competitionAmountInt = $competition_list->competition_amount;
    @endphp
    
<div id="myModal-{{ $competition_list->id }}" class="modal-content hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
  <div class="modal-content">
    <button onclick="closeModal('{{ $competition_list->id }}')" class="absolute top-[30px] right-[20px] mt-2 mr-2 text-gray-500 hover:text-gray-700 w-[100px] h-[100px]">
        &times;
    </button>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="container mx-auto">
                    <div class="text-gray-800 dark:text-white flex justify ">
                        <img class="w-1/2 rounded-lg p-3" src="{{$competition_list->cl_img}}" alt="photo_list" />
                        <div class="rows py-3">
                            <div class="mx-4">
                                รายการแข่งขัน
                            </div>
                            <div class="mx-6">
                                : {{$competition_list->competition_name}}
                            </div>
                            <div class="mx-4">
                                เกม
                            </div>
                            <div class="mx-6">
                                : {{$competition_list->game_name}}
                            </div>
                            <div class="mx-4">
                                เปิดรับสมัครการแข่งขัน
                            </div>
                            <div class="mx-6">
                                : {{$competition_list->opening_date}}
                            </div>
                            <div class="mx-4">
                                ปิดรับการสมัครการแข่งขัน
                            </div>
                            <div class="mx-6">
                                : {{$competition_list->end_date}}
                            </div>
                            <div class="mx-4">
                                กฎกติกาการแข่งขัน
                            </div>
                            <div class="mx-6">
                                : {{$competition_list->competition_rule}}
                            </div>
                            <div class="mx-4">
                                วันเริ่มการแข่งขัน
                            </div>
                            <div class="mx-6">
                                : {{$competition_list->	start_date}}
                            </div>
                            <div class="mx-4">
                                จำนวนทีมที่รับสมัคร
                            </div>
                            <div class="mx-6">
                                : {{$competition_list->	competition_amount}}
                            </div>
                            <div class="mx-4">
                                จำนวนคนที่รับสมัคร
                            </div>  
                            <div class="mx-6">
                                : {{$competition_list->	amount_contestant}}
                            </div>
                            <div class="my-12">
                                <center>
                                <button type="submit" class="@if($count_clid >= $competitionAmountInt) bg-red-500 hover:bg-red-700 @else bg-green-500 hover:bg-gray-700 @endif text-white font-bold py-1 px-1 rounded">
                                    <!-- <button type="submit" class="bg-green-500 hover:bg-gray-700 text-white font-bold py-1 px-1 rounded"> -->
                                    @if($count_clid >= $competitionAmountInt) 
                                        ทีมเต็ม!!
                                    @endif
                                    <a href="{{ route('competition.createTeam', $competition_list->id)}}">
                                        {{ $count_clid < $competitionAmountInt ? 'สมัครทีม' : '' }}
                                    </a>
                                </button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endforeach 
<script>
    function openModal(id) {
        var modal = document.getElementById("myModal-"+id);
        modal.style.display = "block";
    }
    function closeModal(id) {
        var modal = document.getElementById("myModal-"+id);
        modal.style.display = "none";
    }
</script>      
</x-app-layout>
