<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('REGISTER CONTESTANTS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-4xl  p-4 text-gray-900 dark:text-gray-100">
                    <form action="{{route('competition.storeData', $competition_list2)}}" method="POST" enctype="multipart/form-data">
                        
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
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name1" id="c_name1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName1" id="c_inGameName1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName1')" class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email1" id="c_email1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email1')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel1" id="c_tel1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel1')" class="mt-2"/>    
                                    </div>
                                </div>
                            @break
                            
                            @case('2')
                                <div class="grid grid-cols-4 grid-flow-row">
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name1" id="c_name1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName1" id="c_inGameName1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName1')" class="mt-2"/>    
                                    </div> 
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email1" id="c_email1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email1')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel1" id="c_tel1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name2" id="c_name2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name2')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName2" id="c_inGameName2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName2')" class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email2" id="c_email2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email2')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel2" id="c_tel2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel2')" class="mt-2"/>    
                                    </div>
                                </div>
                            @break
                            
                            @case('3')
                                <div class="grid grid-cols-4 grid-flow-row">
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name1" id="c_name1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName1" id="c_inGameName1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName1')" class="mt-2"/>    
                                    </div> 
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email1" id="c_email1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email1')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel1" id="c_tel1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name2" id="c_name2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name2')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName2" id="c_inGameName2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName2')" class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email2" id="c_email2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email2')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel2" id="c_tel2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel2')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name3" id="c_name3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name23') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName3" id="c_inGameName3'"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName3') class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email3'" id="c_email3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email3') class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel3'" id="c_tel3'"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel3')" class="mt-2"/>    
                                    </div>
                                </div>
                            @break

                            @case('4')
                                <div class="grid grid-cols-4 grid-flow-row">
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name1" id="c_name1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName1" id="c_inGameName1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName1')" class="mt-2"/>    
                                    </div> 
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email1" id="c_email1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email1')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel1" id="c_tel1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name2" id="c_name2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name2')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName2" id="c_inGameName2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName2')" class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email2" id="c_email2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email2')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel2" id="c_tel2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel2')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name3" id="c_name3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name23') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName3" id="c_inGameName3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName3') class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email3'" id="c_email3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email3') class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel3" id="c_tel3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel3') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name4" id="c_name4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name4') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName4" id="c_inGameName4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName4') class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email4" id="c_email4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email4') class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel4" id="c_tel4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel4') class="mt-2"/>    
                                    </div>
                                </div>
                            @break

                            @case('5')
                                <div class="grid grid-cols-4 grid-flow-row">
                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name1" id="c_name1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName1" id="c_inGameName1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName1')" class="mt-2"/>    
                                    </div> 
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email1" id="c_email1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email1')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel1" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel1" id="c_tel1"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel1')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name2" id="c_name2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name2')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName2" id="c_inGameName2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName2')" class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email2" id="c_email2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email2')" class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel2" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel2" id="c_tel2"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel2')" class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name3" id="c_name3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name23') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName3" id="c_inGameName3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName3') class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email3'" id="c_email3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email3') class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel3" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel3" id="c_tel3"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel3') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name4" id="c_name4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name4') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName4" id="c_inGameName4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName4') class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email4" id="c_email4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email4') class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel4" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel4" id="c_tel4"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel4') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-1 col-span-1">
                                        <x-input-label for="c_name5" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อ นามสกุล</x-input-label>
                                        <input type="text" name="c_name5" id="c_name5"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_name5') class="mt-2"/>    
                                    </div>

                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_inGameName5" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อในเกม</x-input-label>
                                        <input type="text" name="c_inGameName5" id="c_inGameName5"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_inGameName5') class="mt-2"/>    
                                    </div> 
    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_email5" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                        <input type="email" name="c_email5" id="c_email5"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_email5') class="mt-2"/>    
                                    </div>
                                    
                                    <div class="cols mx-2 col-span-1">
                                        <x-input-label for="c_tel5" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                        <input type="text" name="c_tel5" id="c_tel5"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('c_tel5') class="mt-2"/>    
                                    </div>
                                </div>
                            @break

                            @default
                        @endswitch 
                            
                            <br>
                            <div class="my-1"></div>
                                <div class="cols col-span-3 text-center">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded text-xl">ลงทะเบียน</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>