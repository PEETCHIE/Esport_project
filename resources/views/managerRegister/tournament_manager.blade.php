
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ลงทะเบียนเป็นผู้จัดการแข่ง') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-white">
               
                
    <form method="POST" action="{{ route('managerRegister.store')}}" enctype="multipart/form-data"> 
        @csrf
       
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="grid">
                    <!-- คอลัมน์ 1 -->
                    {{-- <div class="col-md-12">
                        <label for="agency" class="form-label">ชื่อหน่วยงาน</label>
                        <input type="text" class="form-control" name="agency">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="agency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อหน่วยงาน</x-input-label>
                        <input type="text" name="agency" id="agency"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('agency')" class="mt-2"/>    
                    {{-- @error
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="grid">
                    <!-- คอลัมน์ 2 -->
                    {{-- <div class="col-md-12">
                        <label for="agency_tel" class="form-label">เบอร์โทรหน่วยงาน</label>
                        <input type="text" class="form-control" name="agency_tel">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="agency_tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทรหน่วยงาน</x-input-label>
                        <input type="text" name="agency_tel" id="agency_tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('agency_tel')" class="mt-2"/> 
                    {{-- @error('agency_tel')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="grid">
                    <!-- คอลัมน์ 3 -->
                    {{-- <div class="col-md-12">
                        <label for="agnecy_email" class="form-label">อีเมลหน่วยงาน</label>
                        <input type="email" class="form-control" name="agency_email">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="agency_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมลหน่วยงาน</x-input-label>
                        <input type="email" name="agency_email" id="agency_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('agency_email')" class="mt-2"/> 
                    {{-- @error('agency_email')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
            </div>
        </div>
        <!-- แถว 2 -->
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="grid">
                    <!-- คอลัมน์ 1 -->
                    {{-- <div class="col-md-12">
                        <label for="manager_name" class="form-label">ชื่อ (ผู้จัดการแข่งขัน)</label>
                        <input type="text" class="form-control" name="manager_name">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="manager_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ (ผู้จัดการแข่งขัน)</x-input-label>
                        <input type="text" name="manager_name" id="manager_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('manager_name')" class="mt-2"/> 
                    {{-- @error('manager_name')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="grid">
                    <!-- คอลัมน์ 2 -->
                    {{-- <div class="col-md-12">
                        <label for="manager_tel" class="form-label">เบอร์โทร (ผู้จัดการแข่งขัน)</label>
                        <input type="text" class="form-control" name="manager_tel">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="manager_tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทร (ผู้จัดการแข่งขัน)</x-input-label>
                        <input type="text" name="manager_tel" id="manager_tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('manager_tel')" class="mt-2"/> 
                    {{-- @error('manager_tel')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="grid">
                    <!-- คอลัมน์ 3 -->
                    {{-- <div class="col-md-12">
                        <label for="manager_email" class="form-label">อีเมล (ผู้จัดการแข่งขัน)</label>
                        <input type="email" class="form-control" name="manager_email">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="manager_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมล (ผู้จัดการแข่งขัน)</x-input-label>
                        <input type="email" name="manager_email" id="manager_email"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('manager_email')" class="mt-2"/> 
                    {{-- @error('manager_email')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
            </div>
        </div>
        <!-- แถว 3 -->
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="grid">
                    <!-- คอลัมน์ 1 -->
                    {{-- <div class="col-md-12">
                        <label for="coordinator_name" class="form-label">ชื่อ (ผู้ประสานงาน)</label>
                        <input type="text" class="form-control" name="coordinator_name">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="coordinator_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อ (ผู้ประสานงาน)</x-input-label>
                        <input type="text" name="coordinator_name" id="coordinator_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('coordinator_name')" class="mt-2"/> 
                    {{-- @error('coordinator_name')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="grid">
                    <!-- คอลัมน์ 2 -->
                    {{-- <div class="col-md-12">
                        <label for="coordinator_tel" class="form-label">เบอร์โทร (ผู้ประสานงาน)</label>
                        <input type="text" class="form-control" name="coordinator_tel">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="coordinator_tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เบอร์โทร (ผู้ประสานงาน)</x-input-label>
                        <input type="text" name="coordinator_tel" id="coordinator_tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('coordinator_tel')" class="mt-2"/> 
                    {{-- @error('coordinator_tel')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="grid">
                    <!-- คอลัมน์ 3 -->
                    {{-- <div class="col-md-12">
                        <label for="coordinator_email" class="form-label">อีเมล (ผู้ประสานงาน)</label>
                        <input type="email" class="form-control" name="coordinator_email">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="coordinator_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมล (ผู้ประสานงาน)</x-input-label>
                        <input type="email" name="coordinator_email" id="coordinator_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('coordinator_email')" class="mt-2"/> 
                    {{-- @error('coordinator_email')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
            </div>
        </div>
        <!-- แถว 4 -->
        <div class="container-fluid">
            <div class="row align-items-start">
                <div class="grid">
                    <!-- คอลัมน์ 1 -->
                    {{-- <div class="col-md-12">
                        <label for="coordinator_line" class="form-label">ไลน์ (ผู้ประสานงาน)</label>
                        <input type="text" class="form-control" name="coordinator_line">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="coordinator_line" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ไลน์ (ผู้ประสานงาน)</x-input-label>
                        <input type="text" name="coordinator_line" id="coordinator_line" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('coordinator_line')" class="mt-2"/> 
                    {{-- @error('coordinator_line')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="grid">
                    <!-- คอลัมน์ 2 -->
                    {{-- <div class="col-md-12">
                        <label for="date" class="form-label">วัน/เดือน/ปี</label>
                        <input type="date" class="form-control" name="date">
                    </div> --}}
                    <div class="mb-5">
                        <x-input-label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วัน/เดือน/ปี</x-input-label>
                        <input type="date" name="date"  id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-input-error :messages="$errors->get('date')" class="mt-2"/> 
                    {{-- @error('date')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
                <div class="col">
                    <!-- คอลัมน์ 3 -->
                    <div class="mb-12">
                        {{-- <label for="address" class="form-label">ที่อยู่ (หน่วยงาน)</label>
                        <textarea class="form-control" name="coordinator_address" rows="3"></textarea> --}}
                        <label for="coordinator_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ที่อยู่ (หน่วยงาน)</label>
                        <textarea name="coordinator_address" id="coordinator_address" rows="4" 
                        class="block p-2.5 w-full text-sm text-gray-900 
                        bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                        focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address"></textarea>
                    </div>
                    <x-input-error :messages="$errors->get('coordinator_address')" class="mt-2"/> 
                    {{-- @error('coordinator_address')
                    <div class="my-2 text-danger">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror --}}
                </div>
            </div>
        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
            <!-- <button class="btn btn-primary" type="button">ลงทะเบียน</button> -->
            <center><x-primary-button type="submit" class="btn btn-primary">ลงทะเบียน</x-primary-button></center>
            <br>
        </div>
    </div>
    </form>
            </div>
        </div>
    </div>
</x-app-layout>