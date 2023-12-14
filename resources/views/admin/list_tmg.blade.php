<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('LIST TOURNAMENT MANAGERS PERMISSION') }}
        </h2>
    </x-slot>

    <br>
    @if ($message = Session::get('success'))
            <center><div>
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{ $message}}</span> 
                  </div>
            </div></center>
    @endif
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
                    AGENCY
                </th>
                <th scope="col" class="px-6 py-2">
                    MANAGER
                </th>
                <th scope="col" class="px-6 py-3">
                    COORDINATOR
                </th>
                <th scope="col" class="px-6 py-3">
                    STATUS
                </th>
                <th scope="col" class="px-6 py-3">
                    PERMMISION
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
                    {{ $list_tmgs->agency}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->manager_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_name}}
                </td>
                <td class="px-6 py-4">
                    รอการอนุมัติ
                </td>    
                <td class="px-6 py-4">
                    <a href="{{ route('update_confirm_tmg', $list_tmgs->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Confirm</a>
                    || <a href="{{ route('update_cancel_tmg', $list_tmgs->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Not Confirm</a>
                </td>
            </tr>

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
                    AGENCY
                </th>
                <th scope="col" class="px-6 py-2">
                    MANAGER
                </th>
                <th scope="col" class="px-6 py-3">
                    COORDINATOR
                </th>
                <th scope="col" class="px-6 py-3">
                    STATUS
                </th>
                <th scope="col" class="px-6 py-3">
                    PERMMISION
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
                    {{ $list_tmgs->agency}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->manager_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_name}}
                </td>
                <td class="px-6 py-4">
                    อนุมัติเรียบร้อย
                </td>
                   
                <td class="px-6 py-4">
                    <a href="{{ route('update_cancel_tmg', $list_tmgs->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">NOT CONFRIM</a>
                </td>
                
            </tr>
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
                    AGENCY
                </th>
                <th scope="col" class="px-6 py-2">
                    MANAGER
                </th>
                <th scope="col" class="px-6 py-3">
                    COORDINATOR
                </th>
                <th scope="col" class="px-6 py-3">
                    STATUS
                </th>
                <th scope="col" class="px-6 py-3">
                    PERMMISION
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
                    {{ $list_tmgs->agency}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->manager_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $list_tmgs->coordinator_name}}
                </td>
                <td class="px-6 py-4">
                    ไม่อนุมัติ
                </td>  
                <td class="px-6 py-4">
                    <a href="{{ route('update_confirm_tmg', $list_tmgs->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Confirm</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>