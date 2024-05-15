<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('ลงทะเบียนทีมเข้าแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-4xl  p-4 text-gray-900 dark:text-gray-100">
                    <form action="{{route('competition.storeData', $competition_list2)}}" method="POST" enctype="multipart/form-data" id="registrationForm">
                        
                        <div class="container mx-auto">
                        @csrf
                            <div class="grid grid-cols-3 grid-flow-row">
                                <div class="cols mx-1">
                                    <x-input-label for="t_name" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อทีม</x-input-label>
                                    <input type="text" name="t_name" id="t_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('t_name')" class="mt-2"/>    
                                </div>

                                <div class="cols mx-2 col-span-2">
                                    <x-input-label for="logo" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">โลโก้ทีม</x-input-label>
                                    <input type="file" name="logo" id="logo"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('logo')" class="mt-2"/>    
                                </div> 

                                <input type="hidden" name="t_date" id="t_date" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                        @switch($competition_list)
                            @case('1')
                            <div class="grid grid-cols-4 grid-flow-row">
                                @for ($i = 1; $i <= 1; $i++)
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name{{ $i }}" id="c_name{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName{{ $i }}" id="c_inGameName{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email{{ $i }}" id="c_email{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel{{ $i }}" id="c_tel{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel{{ $i }}')" class="mt-2"/>
                                    </div>
                                @endfor
                            </div>
                            @break
                            
                            @case('2')
                            <div class="grid grid-cols-4 grid-flow-row">
                                @for ($i = 1; $i <= 2; $i++)
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name{{ $i }}" id="c_name{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName{{ $i }}" id="c_inGameName{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email{{ $i }}" id="c_email{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel{{ $i }}" id="c_tel{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel{{ $i }}')" class="mt-2"/>
                                    </div>
                                @endfor
                            </div>
                            @break
                            
                            @case('3')
                            <div class="grid grid-cols-4 grid-flow-row">
                                @for ($i = 1; $i <= 3; $i++)
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name{{ $i }}" id="c_name{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName{{ $i }}" id="c_inGameName{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email{{ $i }}" id="c_email{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel{{ $i }}" id="c_tel{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel{{ $i }}')" class="mt-2"/>
                                    </div>
                                @endfor
                            </div>
                            @break

                            @case('4')
                            <div class="grid grid-cols-4 grid-flow-row">
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name{{ $i }}" id="c_name{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName{{ $i }}" id="c_inGameName{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email{{ $i }}" id="c_email{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel{{ $i }}" id="c_tel{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel{{ $i }}')" class="mt-2"/>
                                    </div>
                                @endfor
                            </div>
                            @break

                            @case('5')
                            <div class="grid grid-cols-4 grid-flow-row">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name{{ $i }}" id="c_name{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName{{ $i }}" id="c_inGameName{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email{{ $i }}" id="c_email{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email{{ $i }}')" class="mt-2"/>
                                    </div>
                            
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel{{ $i }}" class="block text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel{{ $i }}" id="c_tel{{ $i }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel{{ $i }}')" class="mt-2"/>
                                    </div>
                                @endfor
                            </div>
                            @break

                            @default
                        @endswitch 
                            
                            <br>
                            <div class="my-1"></div>
                                <div class="cols col-span-3 text-center">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded text-xl" id="sub">ลงทะเบียน</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        function showError(message) {
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: message,
            });
        }
        document.getElementById('sub').addEventListener('click', function (event) {
            event.preventDefault();

            var t_name = document.getElementById('t_name').value;
            var logo = document.getElementById('logo').value;
            var t_date = document.getElementById('t_date').value;

            var c_name1 = document.getElementById('c_name1').value;
            var c_inGameName1 = document.getElementById('c_inGameName1').value;
            var c_email1 = document.getElementById('c_email1').value;
            var c_tel1 = document.getElementById('c_tel1').value;

            var c_name2 = document.getElementById('c_name2').value;
            var c_inGameName2 = document.getElementById('c_inGameName2 ').value;
            var c_email2 = document.getElementById('c_email2').value;
            var c_tel2 = document.getElementById('c_tel2').value;

            var c_name3 = document.getElementById('c_name3').value;
            var c_inGameName3 = document.getElementById('c_inGameName3 ').value;
            var c_email3 = document.getElementById('c_email3').value;
            var c_tel3 = document.getElementById('c_tel3').value;

            var c_name4 = document.getElementById('c_name4').value;
            var c_inGameName4 = document.getElementById('c_inGameName4 ').value;
            var c_email4 = document.getElementById('c_email4').value;
            var c_tel4 = document.getElementById('c_tel4').value;

            var c_name5 = document.getElementById('c_name5').value;
            var c_inGameName5 = document.getElementById('c_inGameName5 ').value;
            var c_email5 = document.getElementById('c_email5').value;
            var c_tel5 = document.getElementById('c_tel5').value;

            if (t_name === '' || logo === '' || t_date === '') {
                showError('กรุณากรอกข้อมูลทีมให้ครบถ้วน');
            } else if ($competition_list === '1' && c_name1 === '' || c_inGameName1 === '' || c_email1 === '' || c_tel1 === '') {
                showError('กรุณากรอกข้อมูลทีมให้ครบถ้วน');
            } else if ($competition_list === '2' && c_name2 === '' || c_inGameName2 === '' || c_email2 === '' || c_tel2 === '') {
                showError('กรุณากรอกข้อมูลทีมให้ครบถ้วน');
            } else if ($competition_list === '3' && c_name3 === '' || c_inGameName3 === '' || c_email3 === '' || c_tel3 === '') {
                showError('กรุณากรอกข้อมูลทีมให้ครบถ้วน');
            } else if ($competition_list === '4' && c_name4 === '' || c_inGameName4 === '' || c_email4 === '' || c_tel4 === '') {
                showError('กรุณากรอกข้อมูลทีมให้ครบถ้วน');
            } else if ($competition_list === '5' && c_name5 === '' || c_inGameName5 === '' || c_email5 === '' || c_tel5 === '') {
                showError('กรุณากรอกข้อมูลทีมให้ครบถ้วน');
            } else {
                Swal.fire({
                    title: "ลงทะเบียนทีมเข้าแข่งขันเรียบร้อย",
                    text: "คุณได้ทำการลงทะเบียนเข้าแข่งขันเรียบร้อยแล้ว",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('registrationForm').submit();
                    }
                });
            }
        });
        
    </script> --}}

</x-app-layout>