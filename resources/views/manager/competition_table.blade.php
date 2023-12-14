<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ข้อมูลจัดการแข่งขัน') }}
        </h2>
    </x-slot>
    
    @if ($message = Session::get('status'))
        <center><div>
            <div class="mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{ $message}}</span> 
            </div>
        </div></center>
    @endif

    <div class="d-grid gap-2 col-6 mx-auto py-6">
        {{-- <button style="background-color: #4caf50; color: white;" class="hover:bg-#45a049 font-bold py-2 px-4 rounded">
            อีกแบบ
        </button> --}}
            <center><button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="{{ route('managers_competition.create') }}"><a href="{{route('managers_competition.create')}}">ADD</a></button></center>
            <br>
        </div>
        <div class="py-3">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-3">
                                {{ __('รายการแข่งขัน') }}
                            </h3>
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mx-auto">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NAME
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DESCRIPTION
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        EDIT
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_competitions as $list_competition)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $list_competition->competition_name}}
                                    </th>
                                    <td class="px-5 py-4">
                                        <p>GAMENAME: {{ $list_competition->game_name}}</p>
                                        <p>OPENNING:{{ $list_competition->opening_date}}</p>
                                        <p>END: {{ $list_competition->end_date}}</p>
                                        <p>START: {{ $list_competition->start_date}}</p>
                                        <p>FINALL: {{ $list_competition->competition_end_date}}</p>
                                        <p>AMOUNT: {{ $list_competition->competition_amount}}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('managers_competition.edit', $list_competition->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">EDIT</a>
                
                                            <form method="POST" action="{{ route('managers_competition.destroy', $list_competition->id)}}"> 
                                                @method('delete')
                                                @csrf
                                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline pl-1">DELETE</button>
                                            </form>
                                        </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>