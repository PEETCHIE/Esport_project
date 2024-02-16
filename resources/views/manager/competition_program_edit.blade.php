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
                    <form action="{{ route('update_competition_program',  $cp_edit->id) }}" method="POST" enctype="multipart/form-data" id="registrationForm">
                        <div class="container mx-auto">
                            @csrf
                            @method('patch')
                            {{ $cp_edit->id}}
                            <div class="grid grid-cols-2 grid-flow-row">
                                <div class="cols mx-1 col-span-1">
                                    <x-input-label for="match_date" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่แข่ง</x-input-label>
                                    <input type="date" value="{{ $cp_edit->match_date}}" name="match_date" id="match_date"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('match_date')" class="mt-2"/>
                                </div>
                                
                                <div class="cols mx-1  col-span-1"> 
                                    <x-input-label for="match_time" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เวลาที่แข่ง</x-input-label>
                                    <input type="time" value="{{ $cp_edit->match_time}}" name="match_time" id="match_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('match_time')" class="mt-2"/>
                                </div>

                            </div>
                                
                                <div class="cols col-span-3 text-center py-2">
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded text-xl" id="update">อัพเดตข้อมูล</button>
                                    <button type="button" class="bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded text-xl" onclick="history.back()">BACK</button>
                                </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>

