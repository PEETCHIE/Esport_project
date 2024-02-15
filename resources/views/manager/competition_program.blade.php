<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('จัดการตารางข้อมูลการแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-4 gap-4">
    @foreach($buckets as $bucket)
        <div class="mx-8 w-48 grid-cols-4 gap-3">
            @php $buttonDisplayed = false; @endphp
            @foreach($bucket['R1'] as $index => $item)
                <b>{{$item->matches}}</b>
                <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                    <div class="flex items-center justify-center mx-auto">
                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                        <span class="ml-2">{{ $item->t_name }}</span>
                        <span class="ml-2">{{ $item->cp_id }}</span>
                    </div>
                    <div class="border bg-white text-black flex items-center justify-center w-10">
                        0
                    </div>
                </div>
                @if($index == 0 && !$buttonDisplayed)
                    <div class="absolute transform translate-x-1 -translate-y-2">
                        <button type="submit" data-modal-target="default-modal" data-modal-toggle="default-modal" data-id="{{ $item->cp_id }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">edit</button>
                    </div>
                @php $buttonDisplayed = true; @endphp
                @endif
            @endforeach
        </div>
        <div class="mx-8 w-48 grid-cols-2 gap-3"> <!-- แก้ grid-cols-4 เป็น grid-cols-2 -->
            @foreach($bucket['R2'] as $item)
                <b>{{$item->matches}}</b>
                <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                    <div class="flex items-center justify-center mx-auto">
                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                        <span class="ml-2">{{ $item->t_name }}</span>
                    </div>
                    <div class="border bg-white text-black flex items-center justify-center w-10">
                        0
                    </div>
                </div>
                @if($index == 0 && !$buttonDisplayed)
                <form action="{{route('edit_competition_program', $item->cp_id)}}">
                    <div class="absolute transform translate-x-1 -translate-y-2">
                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" data-id="{{ $item->cp_id }}" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">edit</button>
                    </div>
                @php $buttonDisplayed = true; @endphp
                </form>
                @endif
            @endforeach
        </div>
    @endforeach
</div>
        
</x-app-layout>


<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full translate-x-[450px] translate-y-[150px]">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    ข้อมูลการแข่งขัน
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <label for="team1">ทีม</label>
                                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                        <span class="ml-2">{{ $item->t_name }}</span>
                                    </div>
                                    <input type="text" class="border border-gray-300 rounded px-2 py-1" placeholder="คะแนน">
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <label for="team2">ทีม</label>
                                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                        <span class="ml-2">{{ $item->t_name }}</span>
                                    </div>
                                    <input type="text" class="border border-gray-300 rounded px-2 py-1" placeholder="คะแนน">
                                </div>
                                <div class="flex justify-end">
                                    <button class="text-gray-500 hover:text-gray-700">แก้ไขเวลา</button>
                                    <button class="ml-4 text-gray-500 hover:text-gray-700">แก้ไขวันที่</button>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">อัพเดต</button>
                            </div>
                        </div>
                    </div>
                </div>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
            const modalHideButtons = document.querySelectorAll('[data-modal-hide]');
            const modal = document.getElementById('default-modal');

            // Function to show modal
            const showModal = () => {
                modal.classList.remove('hidden');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('overflow-hidden');
            };

            // Function to hide modal
            const hideModal = () => {
                modal.classList.add('hidden');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('overflow-hidden');
            };

            // Event listeners for toggle buttons
            modalToggleButtons.forEach(button => {
                button.addEventListener('click', () => {
                    showModal();
                });
            });

            // Event listeners for hide buttons
            modalHideButtons.forEach(button => {
                button.addEventListener('click', () => {
                    hideModal();
                });
            });
        });
    </script>         
 <script>
        @if(session('alert'))
            Swal.fire({
                icon: '{{ session('alert')['icon'] }}',
                title: '{{ session('alert')['title'] }}',
                text: '{{ session('alert')['text'] }}',
            });
        @endif
</script> 