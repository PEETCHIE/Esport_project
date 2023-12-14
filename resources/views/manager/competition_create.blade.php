<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('จัดการแข่งขัน') }}
        </h2>
    </x-slot>
    <div class="py-3">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mt-4 mb-">
            {{ __('เพิ่มรายการแข่งขัน') }}
        </h2>
    <div class="py-3"></div>
        <div class="bg-dark dark:bg-gray-800 max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg">
            <div class="bg-dark dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-white">
                <form method="POST" action="{{ route('managers_competition.store')}}" enctype="multipart/form-data"> 
                    @csrf  
                    {{-- FIRST ROW --}}
                    <div class="grid grid-cols-4 grid-flow-row gap-x-2 gap-y-0.1 grid-md flex flex-wrap space-y-0.5">
                        <div class="col-span-1 m-1 mx">
                            <x-input-label for="competition_name" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">competition_name</x-input-label>
                            <input type="text" name="competition_name" id="competition_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('competition_name')" class="mt-2"/>    
                        </div>            
                        <div class="col-span-1 m-1">
                            <x-input-label for="opening_date" class="block  text-sm font-medium text-gray-900 dark:text-white">opening_date</x-input-label>
                            <input type="date" name="opening_date" id="opening_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('opening_date')" class="mt-2"/> 
                        </div>

                        <div class="col-span-1 m-1">
                            <x-input-label for="end_date" class="block  text-sm font-medium text-gray-900 dark:text-white">end_date</x-input-label>
                            <input type="date" name="end_date" id="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2"/>
                        </div>        
                    
                        <div class="col-span-1 m-1">
                            <x-input-label for="game_name" class="block  text-sm font-medium text-gray-900 dark:text-white">game_name </x-input-label>
                            <input type="text" name="game_name" id="game_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('game_name')" class="mt-2"/>
                        </div> 
                    
                        <div class="col-span-1 m-1">
                            <x-input-label for="start_date" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">start_date</x-input-label>
                            <input type="date" name="start_date" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('start_date')" class="mt-2"/>
                        </div> 

                        <div class="col-span-1 m-1">
                            <x-input-label for="competition_end_date" class="block  text-sm font-medium text-gray-900 dark:text-white">competition _end_date</x-input-label>
                            <input type="date" name="competition_end_date" id="competition_end_date"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('competition_end_date')" class="mt-2"/> 
                        </div>

                        <div class="col-span-1 m-1">
                            <x-input-label for="competition_amount" class="block  text-sm font-medium text-gray-900 dark:text-white">competition_amount</x-input-label>
                            <input type="number" name="competition_amount" id="competition_amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('competition_amount')" class="mt-2"/> 
                        </div>

                        <div class="col-span-2 m-1 overflow-y-auto">
                            <label for="competition_rule" class="block  text-sm font-medium text-gray-900 dark:text-white">competition_rule</label>
                            <textarea name="competition_rule" id="competition_rule" rows="4" 
                            class="block p-2.5 w-full text-sm text-gray-900 
                            bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                            focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="competition_rule"></textarea>
                            <x-input-error :messages="$errors->get('competition_rule')" class="mt-2"/> 
                        </div>
                    
                        <div class="col-span-1 m-1">
                            <label for="competition_type" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">Select an competition_type</label>
                                <select id="competition_type" name="competition_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="1">จับคู่</option>
                                </select>
                            <x-input-error :messages="$errors->get('competition_type')" class="mt-2"/>   
                        </div>

                        <div class="col-span-1 m-1">
                            <label for="cl_round" class="block  text-sm font-medium text-gray-900 dark:text-white">Select an cl_round</label>
                                <select id="cl_round" name="cl_round" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>ROUND</option>
                                    <option value="1">BEST OF 1</option>
                                    <option value="3">BEST OF 3</option>
                                    <option value="5">BEST OF 5</option>
                                </select>
                            <x-input-error :messages="$errors->get('cl_round')" class="mt-2"/>
                        </div>

                        <div class="col-span-1 m-1">
                            <x-input-label for="cl_img" class="block  text-sm font-medium text-gray-900 dark:text-white">cl_img</x-input-label>
                            <input type="file" name="cl_img"  id="cl_img" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error :messages="$errors->get('cl_img')" class="mt-2"/> 
                        </div> 

                        <div class="col-span-1 m-1">
                            <label for="amount_contestant" class="block  text-sm font-medium text-gray-900 dark:text-white">amount_contestant</label>
                                <select id="amount_contestant" name="amount_contestant" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>amount_contestant</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            <x-input-error :messages="$errors->get('amount_contestant')" class="mt-2"/>
                        </div>
                    </div>

                        <div class="d-grid gap-2 col-6 mx-auto py-3">
                            <!-- <button class="btn btn-primary" type="button">ลงทะเบียน</button> -->
                            <center><x-primary-button type="submit" class="btn btn-primary">เพิ่มรายการแข่ง</x-primary-button></center>
                            <br>
                        </div>
                </form> 
            </div> 
        </div>  
    </div>   

</x-app-layout>