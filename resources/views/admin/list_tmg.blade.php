<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('รายชื่อผู้จัดการการแข่งขัน') }}
        </h2>
    </x-slot>

    <br>
   

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-3">
            {{ __('รอการอนุมัติ') }}
        </h3>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    TMG-ID
                </th>
                <th scope="col" class="px-6  py-3">
                    ชื่อผู้ประสานงาน
                </th>
                <th scope="col" class="px-6 py-2">
                    ชื่อหน่วยงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    ข้อมูลหน่วยงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    ข้อมูลผู้ประสานงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    สถานะ
                </th>
                <th scope="col" class="px-6 py-3">
                    จัดการสิทธิ์การใช้งาน
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_tmg as $list_tmgs)
            @if($list_tmgs->permission == 0)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $list_tmgs->id}}
                </th>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->organization_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->organization_detail}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_detail}}
                </td>
                <td class="px-6 py-4">
                    รอการอนุมัติ
                </td>    
                <td class="px-6 py-4">
                <button type="button" class="give-button inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="confirmAndRedirect('{{ route('update_confirm_tmg', $list_tmgs->id) }}', 'ต้องการให้สิทธิ์การใช้งานหรือไม่?', 'สิทธิ์การใช้งานถูกให้แก่ผู้ใช้')">ให้สิทธิ์ใช้งาน</button>
                <button type="button" class="no-button inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="confirmAndRedirect('{{ route('update_cancel_tmg', $list_tmgs->id) }}', 'ต้องการไม่ให้สิทธิ์การใช้งานหรือไม่?', 'สิทธิ์การใช้งานถูกยกเลิก')">ไม่ให้สิทธิ์การใช้งาน</button>
                    <!-- <button type="button" href="{{ route('update_confirm_tmg', $list_tmgs->id) }}" class="give-button inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">ให้สิทธิ์ใช้งาน</button>
                    <button type="button" href="{{ route('update_cancel_tmg', $list_tmgs->id) }}" class="no-button inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">ไม่ให้สิทธิ์การใช้งาน</button> -->
                </td>
            </tr>
            <script>
                function confirmAndRedirect(url, title, successMessage) {
                    Swal.fire({
                        title: title,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่',
                        cancelButtonText: 'ไม่'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: successMessage,
                                icon: 'success'
                            }).then(() => {
                                window.location.href = url;
                            });
                        }
                    });
                }
            </script>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
<br>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-3">
            {{ __('อนุมัติเรียบร้อย') }}
        </h3>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    TMG-ID
                </th>
                <th scope="col" class="px-6  py-3">
                    ชื่อผู้ประสานงาน
                </th>
                <th scope="col" class="px-6 py-2">
                    ชื่อหน่วยงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    ข้อมูลหน่วยงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    ข้อมูลผู้ประสานงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    สถานะ
                </th>
                <th scope="col" class="px-6 py-3">
                    จัดการสิทธิ์การใช้งาน
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_tmg as $list_tmgs)
            @if($list_tmgs->permission == 1)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $list_tmgs->id}}
                </th>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->organization_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->organization_detail}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_detail}}
                </td>
                <td class="px-6 py-4">
                    อนุมัติเรียบร้อย
                </td>
                   
                <td class="px-6 py-4">
                    <button type="button" class="no-button inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="confirmAndRedirect('{{ route('update_cancel_tmg', $list_tmgs->id) }}', 'ต้องการระงับสิทธิ์การใช้งานหรือไม่?', 'สิทธิ์การใช้งานถูกยกเลิก')">ระงับสิทธิ์การใช้งาน</button>
                </td>
            </tr>
            <script>
                function confirmAndRedirect(url, title, successMessage) {
                    Swal.fire({
                        title: title,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่',
                        cancelButtonText: 'ไม่'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: successMessage,
                                icon: 'success'
                            }).then(() => {
                                window.location.href = url;
                            });
                        }
                    });
                }
            </script>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
<br>    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-3">
            {{ __('ไม่อนุมัติ') }}
        </h3>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    TMG-ID
                </th>
                <th scope="col" class="px-6  py-3">
                    ชื่อผู้ประสานงาน
                </th>
                <th scope="col" class="px-6 py-2">
                    ชื่อหน่วยงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    ข้อมูลหน่วยงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    ข้อมูลผู้ประสานงาน
                </th>
                <th scope="col" class="px-6 py-3">
                    สถานะ
                </th>
                <th scope="col" class="px-6 py-3">
                    จัดการสิทธิ์การใช้งาน
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_tmg as $list_tmgs)
            @if($list_tmgs->permission == 2)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $list_tmgs->id}}
                </th>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->organization_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->organization_detail}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_detail}}
                </td>
                <td class="px-6 py-4">
                    ไม่อนุมัติ
                </td>  
                <td class="px-6 py-4">
                    <button type="button" class="give-button inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="confirmAndRedirect('{{ route('update_confirm_tmg', $list_tmgs->id) }}', 'ต้องการให้สิทธิ์การใช้งานหรือไม่?', 'สิทธิ์การใช้งานถูกให้แก่ผู้ใช้')">ให้สิทธิ์ใช้งาน</button>
                </td>
            </tr>
            <script>
                function confirmAndRedirect(url, title, successMessage) {
                    Swal.fire({
                        title: title,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่',
                        cancelButtonText: 'ไม่'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: successMessage,
                                icon: 'success'
                            }).then(() => {
                                window.location.href = url;
                            });
                        }
                    });
                }
            </script>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>