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
                @foreach($competition_lists as $competition_list)  
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
                            <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded m-1">รายละเอียด</button>
                            <!-- <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded m-1"><a href="{{ route('competition.detail', $competition_list->id)}}">รายละเอียด</a></button> -->
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded "><a href="{{ route('team_grid', $competition_list->id) }}">ทีมที่เข้าร่วม</a></button>
                        </div>
                        </div>
                    </div>
                @endforeach            
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden absolute  right-1/2 top-1/2 transform translate-x-1/2 -translate-y-1 justify-center items-center w-[700px] h-[700px] md:inset-0">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        รายละเอียด
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="py-12">
                <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="container mx-auto">
                            <div class="text-gray-800 dark:text-white flex justify ">
                                <img class="w-1/2 rounded-lg p-3" src="{{$competition_list->cl_img}}" alt="photo_list" />
                                <!-- <img class="w-1/2 rounded-lg object-cover p-3" src="{{$competition_list->cl_img}}" alt="product" /> -->
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
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
            const modalHideButtons = document.querySelectorAll('[data-modal-hide]');
            const modal = document.getElementById('default-modal');

            // Function to show modal
            const showModal = () => {
                modal.classList.remove('hidden');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('overflow-hidden');
            };

            // Function to hide modal
            const hideModal = () => {
                modal.classList.add('hidden');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('overflow-hidden');
            };

            // Event listeners for toggle buttons
            modalToggleButtons.forEach(button => {
                button.addEventListener('click', () => {
                    showModal();
                });
            });

            // Event listeners for hide buttons
            modalHideButtons.forEach(button => {
                button.addEventListener('click', () => {
                    hideModal();
                });
            });
        });
    </script> --}}
</x-app-layout>