<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('แก้ไขข้อมูลรายการแข่ง') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-4xl  p-4 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('managers_competition.update', $competition_list->id) }}" method="POST" enctype="multipart/form-data" id="registrationForm">
                        <div class="container mx-auto">
                            @csrf
                            @method('patch')
                            <div class="grid grid-cols-4 grid-flow-row">
                                <div class="cols mx-1 col-span-1">
                                    <x-input-label for="competition_name" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อรายการแข่งขัน</x-input-label>
                                    <input type="text" value="{{ $competition_list->competition_name }}" name="competition_name" id="competition_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('competition_name')" class="mt-2"/>       
                                </div>
                                
                                <div class="cols mx-1  col-span-1"> 
                                    <x-input-label for="opening_date" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่เปิดรับสมัคร</x-input-label>
                                    <input type="date" value="{{ $competition_list->opening_date }}" name="opening_date" id="opening_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('opening_date')" class="mt-2"/> 
                                </div>

                                <div class="cols mx-1  col-span-1"> 
                                    <x-input-label for="end_date" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่ปิดรับสมัคร</x-input-label>
                                    <input type="date" value="{{ $competition_list->end_date }}" name="end_date" id="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2"/> 
                                </div>

                                <div class="cols mx-1 col-span-1">
                                    <x-input-label for="game_name" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อเกม </x-input-label>
                                    <input type="text" value="{{ $competition_list->game_name }}" name="game_name" id="game_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('game_name')" class="mt-2"/>    
                                </div>

                                <div class="cols mx-1  col-span-2"> 
                                    <x-input-label for="start_date" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่เริ่มแข่งขัน</x-input-label>
                                    <input type="date" value="{{ $competition_list->start_date }}" name="start_date" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2"/> 
                                </div>

                                <div class="cols mx-1  col-span-2"> 
                                    <x-input-label for="competition_end_date" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันสิ้นสุดการแข่งขัน</x-input-label>
                                    <input type="date" value="{{ $competition_list->competition_end_date }}" name="competition_end_date" id="competition_end_date"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('competition_end_date')" class="mt-2"/>  
                                </div>

                                <div class="cols mx-1  col-span-1"> 
                                    <label for="cl_round" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เลือกรอบการแข่ง</label>
                                        <select id="cl_round" name="cl_round" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @if($competition_list->cl_round == 1)
                                                <option selected value="1">BEST OF 1</option>
                                                <option value="3">BEST OF 3</option>
                                                <option value="5">BEST OF 5</option>
                                            @elseif ($competition_list->cl_round == 3)
                                                <option selected value="3">BEST OF 3</option>
                                                <option value="1">BEST OF 1</option>
                                                <option value="5">BEST OF 5</option>    
                                            @else
                                                <option selected value="5">BEST OF 5</option>
                                                <option value="1">BEST OF 1</option>
                                                <option value="3">BEST OF 3</option>   
                                            @endif
                                        </select>
                                    <x-input-error :messages="$errors->get('cl_round')" class="mt-2"/>
                                </div>

                                <div class="cols mx-1  col-span-1"> 
                                    <x-input-label for="competition_amount" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">จำนวนทีมที่เข้าแข่งขัน</x-input-label>
                                    <select id="competition_amount"  name="competition_amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if($competition_list->competition_amount == 8)
                                            <option selected value="8">8 ทีม</option>
                                            <option value="16">16 ทีม</option>
                                            <option value="32">32 ทีม</option>
                                        @elseif ($competition_list->competition_amount == 16)
                                            <option selected value="16">16 ทีม</option>
                                            <option value="8">8 ทีม</option>
                                            <option value="32">32 ทีม</option>    
                                        @else
                                            <option selected value="32">32 ทีม</option>
                                            <option value="8">8 ทีม</option>
                                            <option value="16">16 ทีม</option>   
                                        @endif
                                    </select>
                                    <x-input-error :messages="$errors->get('competition_amount')" class="mt-2"/>  
                                </div>

                                <div class="cols mx-1  col-span-1 ">
                                    <label for="amount_contestant" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">จำนวนผู้เข้าแข่งขัน</label>
                                        <select id="amount_contestant" name="amount_contestant" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @if($competition_list->amount_contestant == 1)
                                                <option selected value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            @elseif ($competition_list->amount_contestant == 2)
                                                <option value="1">1</option>
                                                <option selected value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            @elseif ($competition_list->amount_contestant == 3)
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option selected value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            @elseif ($competition_list->amount_contestant == 4)
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option selected value="4">4</option>
                                                <option value="5">5</option>    
                                            @else
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option selected value="5">5</option>   
                                            @endif
                                        </select>
                                    <x-input-error :messages="$errors->get('amount_contestant')" class="mt-2"/>
                                </div>
                                                           
                                <div class="cols mx-1  col-span-2 "> 
                                    <label for="competition_rule" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">กฎกติกาการแข่งขัน</label>
                                    <textarea value="{{ $competition_list->competition_rule }}" name="competition_rule" id="competition_rule" rows="4" 
                                    class="block p-2.5 w-full text-sm text-gray-900 
                                    bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                                    focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{ $competition_list->competition_rule }}</textarea>
                                    <x-input-error :messages="$errors->get('competition_rule')" class="mt-2"/>  
                                </div>

                                <div class="flex flex-col items-center transform translate-x-[50px]">
                                    <div class="cols mx-1  col-span-1"> 
                                        <x-input-label for="cl_img" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">รูปรายการ</x-input-label>
                                            <input type="file" value="{{ $competition_list->cl_img}}"
                                            name="cl_img" id="cl_img" onChange="loadFile(event)"
                                            class="bg-gray-50 border border-gray-300 text-gray-900
                                            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                                            block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                            dark:placeholder-gray-400 dark:text-white
                                            dark:focus:ring-blue-500">
                                        <x-input-error :messages="$errors->get('cl_img')" class="mt-2"/>
                                    </div>
                                        <div class="cols p-5 mt-[-24px]"> 
                                            <img id="output"  class="h-50 w-54 rounded-lg py-2" src="{{ $competition_list->cl_img}}" />
                                        </div>
                                    <!-- <div class="mt-[-24px]">
                                        <label class="block">
                                            <span class="sr-only">Choose profile photo</span>
                                            <input type="file" class="block w-full text-sm text-slate-500
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-full file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-violet-50 file:text-violet-700
                                            hover:file:bg-violet-100
                                            "/>
                                        </label>
                                        <label for="upload-file" class="bg-blue-500 hover:bg-blue-700 text-white py-[4px] px-[16px] rounded text-xl cursor-pointer mr-3">
                                            อัพรูป
                                        </label>
                                        <input id="upload-file" type="file" class="hidden">
                                        <button id="delete-image" class="bg-red-500 hover:bg-red-700 text-white py-[2.5px] px-[16px] rounded text-xl">ลบรูป</button>
                                    </div> -->
                                </div>
                                

                            </div>
                                
                                <div class="cols col-span-3 text-center py-2">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded text-xl" id="update">อัพเดตข้อมูล</button>
                                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-1 rounded text-xl" onclick="history.back()">ย้อนกลับ</button>
                                </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let on;
        let off;
         
        function showError(message) {
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: message,
            });
        }
        document.getElementById('update').addEventListener('click', function (event) {
            event.preventDefault();
            var competition_name = document.getElementById('competition_name').value;
            var opening_date = document.getElementById('opening_date').value;
            var end_date = document.getElementById('end_date').value;
            var game_name = document.getElementById('game_name').value;
            var start_date = document.getElementById('start_date').value;
            var competition_end_date = document.getElementById('competition_end_date').value;
            var cl_round = document.getElementById('cl_round').value;
            var competition_amount = document.getElementById('competition_amount').value;
            var amount_contestant = document.getElementById('amount_contestant').value;
            var competition_rule = document.getElementById('competition_rule').value;
            var cl_img = document.getElementById('cl_img').value;

            if (competition_name === '' || opening_date === '' || end_date === '' || game_name === '' || start_date === '' || competition_end_date === ''
            || cl_round === '' || competition_amount === '' || amount_contestant === '' || competition_rule === '' || cl_img === '') {
                showError('กรุณากรอกข้อมูลให้ครบถ้วน');
            } else {
                Swal.fire({
                    title: "อัพเดตข้อมูลรายการแข่งขันเรียบร้อย",
                    text: "คุณสามารถแก้ไขภายหลังได้",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('registrationForm').submit();
                    }
                });
            }
        });
    </script>   
</x-app-layout>
<script>
    document.getElementById('delete-image').addEventListener('click', function() {
    document.getElementById('output').src = '';
    

    });
    function loadFile(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0])
    }
</script>