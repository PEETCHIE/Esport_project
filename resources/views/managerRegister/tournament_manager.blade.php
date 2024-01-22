
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ลงทะเบียนเป็นผู้จัดการแข่ง') }}
        </h2>
    </x-slot>
    @if ($message = Session::get('status'))
    <center><div>
        <div class="mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ $message}}</span> 
        </div>
    </div></center>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-4xl  p-4 text-gray-900 dark:text-gray-100">
                    <form action="{{route('managerRegister.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="container mx-auto">
                            @csrf
                            <div class="grid grid-cols-4 grid-flow-row">
                                <div class="cols mx-1 col-span-2">
                                    <x-input-label for="coordinator_name" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อผู้ประสานงาน</x-input-label>
                                    <input type="text" name="coordinator_name" id="coordinator_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('coordinator_name')" class="mt-2"/>    
                                </div>

                                <div class="cols mx-1 col-span-2">
                                    <x-input-label for="organization_name" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อหน่วยงาน</x-input-label>
                                    <input type="text" name="organization_name" id="organization_name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('organization_name')" class="mt-2"/>    
                                </div> 

                                <div class="cols mx-1 col-span-2">
                                    <label for="organization_detail" class="block  text-sm font-medium text-gray-900 dark:text-white">ข้อมูลหน่วยงาน</label>
                                    <textarea name="organization_detail" id="organization_detail" rows="4" 
                                    class="block p-2.5 w-full text-sm text-gray-900 
                                    bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                                    focus:border-bluorganization_detaile-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ข้อมูลหน่วยงาน"></textarea>
                                    <x-input-error :messages="$errors->get('organization_detail')" class="mt-2"/> 
                                </div>

                                <div class="cols mx-1 col-span-2">
                                    <label for="coordinator_detail" class="block  text-sm font-medium text-gray-900 dark:text-white">ข้อมูลที่ประสานงาน</label>
                                    <textarea name="coordinator_detail" id="coordinator_detail" rows="4" 
                                    class="block p-2.5 w-full text-sm text-gray-900 
                                    bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                                    focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ข้อมูลหน่วยงาน"></textarea>
                                    <x-input-error :messages="$errors->get('coordinator_detail')" class="mt-2"/> 
                                </div>

                                <div class="cols mx-1 col-span-2">
                                    <x-input-label for="email" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">E-mail</x-input-label>
                                    <input type="email" name="email" id="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>    
                                </div>

                                <div class="cols mx-1 col-span-2">
                                    <x-input-label for="tel" class="block  text-sm font-medium text-gray-900 dark:text-white py-2">เบอร์โทร</x-input-label>
                                    <input type="text" name="tel" id="tel"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('tel')" class="mt-2"/>    
                                </div>
                            </div>

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