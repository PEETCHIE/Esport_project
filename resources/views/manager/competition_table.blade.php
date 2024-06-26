<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('ข้อมูลจัดการแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="d-grid gap-2 col-6 mx-auto py-6">
        {{-- <button style="background-color: #4caf50; color: white;" class="hover:bg-#45a049 font-bold py-2 px-4 rounded">
            อีกแบบ
        </button> --}}
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded  float-right mr-6" onclick="{{ route('managers_competition.create') }}"><a href="{{route('managers_competition.create')}}">เพิ่มรายการแข่ง</a></button>
            <br>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-[1300px] ml-[120px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 mx-auto bg-slate-900">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        รูปรายการ
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
                    <th scope="col" class="px-6 py-3">
                        ตารางการแข่งขัน
                    </th>
                </tr>
            </thead>
            <tbody class="text-black">
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
                        <p>วันที่เปิดรับสมัคร: {{ \Carbon\Carbon::parse($list_competition->opening_date)->format('d') }}
                            {{ \Carbon\Carbon::parse($list_competition->opening_date)->locale('th')->monthName }}
                            {{ \Carbon\Carbon::parse($list_competition->opening_date)->year + 543 }}</p>
                        <p>วันที่ปิดรับสมัคร: 
                            {{ \Carbon\Carbon::parse($list_competition->end_date)->format('d') }}
                            {{ \Carbon\Carbon::parse($list_competition->end_date)->locale('th')->monthName }}
                            {{ \Carbon\Carbon::parse($list_competition->end_date)->year + 543 }}</p>
                        <p>วันเริ่มการแข่งขัน: 
                            {{ \Carbon\Carbon::parse($list_competition->start_date)->format('d') }}
                            {{ \Carbon\Carbon::parse($list_competition->start_date)->locale('th')->monthName }}
                            {{ \Carbon\Carbon::parse($list_competition->start_date)->year + 543 }}</p>
                        <p>วันสิ้น: {{ \Carbon\Carbon::parse($list_competition->competition_end_date)->format('d/m/Y')}}
                            {{ \Carbon\Carbon::parse($list_competition->competition_end_date)->format('d') }}
                            {{ \Carbon\Carbon::parse($list_competition->competition_end_date)->locale('th')->monthName }}
                            {{ \Carbon\Carbon::parse($list_competition->competition_end_date)->year + 543 }}</p>
                        <p>จำนวนทีม: {{ $list_competition->competition_amount}}</p>
                        <p>จำนวนคนในทีม: {{ $list_competition->amount_contestant}}</p>
                        <p class="text text-red-800">จำนวนทีมที่สมัครเข้ามาปัจจุบัน: 
                            @foreach ($count_teams as $count)
                                @if ($count->cl_id == $list_competition->id)
                                    {{ $count->team_count }}
                                @endif
                            @endforeach
                        </p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            @if($list_competition->opening_date < $currentDate )
                                <a href="#" id="NoEdit_{{ $list_competition->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">แก้ไข</a>
                                {{-- <button type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline pl-1" >แก้ไข</button> --}}
                            @else
                                <a href="{{ route('managers_competition.edit', $list_competition->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">แก้ไข</a>
                            @endif

                            <form id="deleteForm{{ $list_competition->id }}" method="POST" action="{{ route('managers_competition.destroy', $list_competition->id)}}"> 
                                @method('delete')
                                @csrf
                                <button type="button" class="font-medium text-red-600 dark:text-red-500 hover:underline pl-1" onclick="confirmAndRedirect('deleteForm{{ $list_competition->id }}', 'ต้องการลบรายการแข่งขันจริงหรือไม่?')">ลบ</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <form  id="makeForm{{ $list_competition->id }}" action="{{ route('competition_program', $list_competition->id)}}"> 
                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline pl-1" onclick="makeTable('{{ $list_competition->id }}')">ทำตารางการแข่งขัน</button>
                        </form>
                        <form  id="test" action="{{ route('show_competition_program', $list_competition->id)}}"> 
                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline pl-1" onclick="">ดูตารางการแข่งขัน</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach 
                
            </tbody>
            
        </table>    
        <div class="flex justify-center mt-4 p-2">
            {{ $list_competitions->links() }}
        </div>
    </div>
    
    {{-- <script>
        function makeTable(formId) {
            var form = document.getElementById("makeForm" + formId);
            if (form) {
                form.submit();
                var button = form.querySelector("button[type='submit']");
                if (button) {
                    button.disabled = true;
                    button.style.color = "gray";
                    // เก็บค่าการคลิกปุ่มไว้ใน localStorage
                    localStorage.setItem("buttonClicked" + formId, true);
                }
            }
        }
        // เรียกใช้งานฟังก์ชั่นเมื่อโหลดหน้าเว็บ
        window.onload = function() {
            // ตรวจสอบว่าปุ่มได้ถูกคลิกไว้หรือไม่ และเปิดใช้งานปุ่มที่ถูกคลิกไว้
            @foreach ($list_competitions as $list_competition)
                var clicked = localStorage.getItem("buttonClicked{{ $list_competition->id }}");
                if (clicked) {
                    var button = document.getElementById("makeForm{{ $list_competition->id }}").querySelector("button[type='submit']");
                    if (button) {
                        button.disabled = true;
                        button.style.color = "gray";
                    }
                }
            @endforeach
        };
    </script> --}}

    <script>
        document.querySelectorAll('[id^="NoEdit_"]').forEach(function(element) {
        element.addEventListener('click', function(event) {
        event.preventDefault();

            Swal.fire({
                title: "ไม่สามารถแก้ไขได้",
                text: "คุณไม่สามารถแก้ไขได้เนื่องจากถึงวันที่เปิดรับสมัครแล้ว",
                icon: "error"
            });
            });
        });
    </script>

    <script>
        function confirmAndRedirect(formId, title, successMessage) {
            var form = document.getElementById(formId);
            if (!form) {
                console.error('Form not found');
                return;
            }
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่',
                cancelButtonText: 'ไม่'
            }).then((result) => {
                if (result.isConfirmed){
                        form.submit();  
                }
            });       
       
        }
        @if(session('alert'))
            Swal.fire({
                icon: '{{ session('alert')['icon'] }}',
                title: '{{ session('alert')['title'] }}',
                text: '{{ session('alert')['text'] }}',
            });
        @endif
    </script>
</x-app-layout>