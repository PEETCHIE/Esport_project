<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('รายละเอียดการแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="container mx-auto">
                    <div class="text-gray-800 dark:text-white flex justify ">
                        <img class="w-1/2 rounded-lg object-cover" src="{{$competition_list->cl_img}}" alt="product" />
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
                            

                                <div class="my-12">
                                    <center><button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded">
                                        @if($count_clid >= $competitionAmountInt) 
                                            <p>FULL</p>
                                        @endif
                                        <a href="{{ route('competition.createTeam', $competition_list->id)}}">
                                            {{ $count_clid < $competitionAmountInt ? 'REGISTER' : '' }}
                                        </a>
                                    </button></center>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>