<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('สมาชิกเข้าแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($message = Session::get('status'))
        <center>
        <div>
            <div class="mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{ $message}}</span> 
            </div>
        </div>
        </center>
        @endif
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-5 grid-flow-row dark:text-gray-200 leading-tight grid-md flex flex-wrap">
                @foreach($team_details as $team_detail)        
                <div class="mx-auto px-5 justify-center m-3">
                    <div class="max-w-xs cursor-pointer rounded-lg p-2 shadow duration-150 hover:scale-105 hover:shadow-md"
                        style="background-image: url(/asset/img/Bg-ll.png); background-size: cover; background-position: center;">
                        <img class="h-40 w-52 rounded-lg object-cover object-center" src="{{ url('/asset/img/user.jpg')}}" alt="user" />
                        <p class="my-2 mt-5 pl-4 font-bold text-white">ชื่อ: {{ $team_detail->c_name}}</p>
                        <p class="my-2 pl-4 font-bold text-white">ชื่อในเกม: {{ $team_detail->c_inGameName}}</p>
                        <p class="my-2 pl-4 font-bold text-white">อีเมล: {{ $team_detail->c_email}}</p>
                        <p class="my-2 pl-4 font-bold text-white">เบอร์: {{ $team_detail->c_tel}}</p>
                        {{-- <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded "><a href="{{ route('team_detail', $team_list->id) }}">TEAM</a></button> --}}
                    </div>
                </div>
                @endforeach            
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>