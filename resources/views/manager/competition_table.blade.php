<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ข้อมูลจัดการแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="d-grid gap-2 col-6 mx-auto py-6">
        {{-- <button style="background-color: #4caf50; color: white;" class="hover:bg-#45a049 font-bold py-2 px-4 rounded">
            อีกแบบ
        </button> --}}
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded  float-right mr-6" onclick="{{ route('managers_competition.create') }}"><a href="{{route('managers_competition.create')}}">เพิ่มรายการแข่ง</a></button>
            <br>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mx-auto">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        โลโก้ทีม
                    </th>
                    <th scope="col" class="px-6 py-3">
                       ชื่อรายการแข่ง
                    </th>
                    <th scope="col" class="px-6 py-3">
                        รายละเอียด
                    </th>
                    <th scope="col" class="px-6 py-3">
                        แก้ไข
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_competitions as $list_competition)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img src="{{ $list_competition->cl_img}}" class="h-48 w-48 rounded-lg">
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $list_competition->competition_name}}
                    </th>
                    <td class="px-5 py-4">
                        <p>ชื่อรายการแข่ง: {{ $list_competition->game_name}}</p>
                        <p>วันที่เปิดรับสมัคร:{{ $list_competition->opening_date}}</p>
                        <p>วันที่ปิดรับสมัคร: {{ $list_competition->end_date}}</p>
                        <p>วันเริ่มการแข่งขัน: {{ $list_competition->start_date}}</p>
                        <p>วันสิ้น: {{ $list_competition->competition_end_date}}</p>
                        <p>จำนวนทีม: {{ $list_competition->competition_amount}}</p>
                        <p>จำนวนคนในทีม: {{ $list_competition->amount_contestant}}</p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
<<<<<<< HEAD
                            <a href="{{ route('managers_competition.edit', $list_competition->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">EDIT</a>
=======
                            <a href="{{ route('managers_competition.edit', $list_competition->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">แก้ไข</a>

>>>>>>> c0969000b95f517e9fa8e742a257c64fe490ba50
                            <form method="POST" action="{{ route('managers_competition.destroy', $list_competition->id)}}"> 
                                @method('delete')
                                @csrf
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline pl-1">ลบ</button>
                            </form>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</x-app-layout>