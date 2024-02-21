<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('จัดการตารางข้อมูลการแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-4 gap-1">
        <div>
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-48 grid-cols-4 gap-3">
                    @foreach($bucket['R1'] as $item)
                    {{$item->cp_id}}
                    <br>
                    <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                        <div class="flex items-center justify-center mx-auto">
                            <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                            <span class="ml-2">{{ $item->t_name }}</span>
                        </div>
                        <div class="border bg-white text-black flex items-center justify-center w-10">
                            0
                        </div>
                    </div>
                    @endforeach
                    <div class="absolute transform translate-x-1 -translate-y-[50px]">
                        <button onclick="openModal('{{ $item->cp_id }}')" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
            <div class="absolute translate-x-[50px] translate-y-[130px]">
                <div class="border-t-[3px] w-[100px] -translate-y-[67px] translate-x-[249px]"></div>
                <div class="border-t-[3px] w-[100px]  translate-y-8 translate-x-[249px]"></div>
                <div class="border-r-[3px] h-[104px] -translate-y-[72px] translate-x-[250px]"></div>
                <div class="border-t-[3px] w-[25px] -translate-y-[125px] translate-x-[350px]"></div>
            </div>
        <div>
            @foreach ($buckets as $bucket)
                <div class="mx-8 w-48 grid-cols-4 gap-3 mt-[55px]">
                    @foreach ($bucket['R2'] as $item)
                        {{ $item->cp_id }}
                        <br>
                        <div
                            class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                            <div class="flex items-center justify-center mx-auto">
                                <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                <span class="ml-2">{{ $item->t_name }}</span>
                            </div>
                            <div class="border bg-white text-black flex items-center justify-center w-10">
                                0
                            </div>
                        </div>
                        <div class="absolute transform translate-x-1 translate-y-[3px]">
                            <button onclick="openModal('{{ $item->cp_id }}')" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                                แก้ไข
                            </button>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div>
            <div class="mx-8 w-48 grid-cols-4 gap-3">
                <div
                    class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                    <div class="flex items-center justify-center mx-auto">
                        <img src="#" class="w-5 h-5" alt="">
                        <span class="ml-2">round3</span>
                    </div>
                    <div class="border bg-white text-black flex items-center justify-center w-10">
                        0
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="mx-8 w-48 grid-cols-4 gap-3">
                <div
                    class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                    <div class="flex items-center justify-center mx-auto">
                        <img src="#" class="w-5 h-5" alt="">
                        <span class="ml-2">round4</span>
                    </div>
                    <div class="border bg-white text-black flex items-center justify-center w-10">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

            @foreach($teamsWithSameCpId as $cp_id => $teams)
            <div id="modal-content-{{ $cp_id }}" class="modal-content hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                    <div class="bg-white rounded-lg w-1/2 md:w-1/3 p-4 md:p-5 space-y-4 relative">
                        <button onclick="closeModal()" class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 w-[50px] h-[50px]">
                            &times;
                        </button>
            <form id="update-form-{{ $cp_id }}" action="{{ route('update_competition_program',  $cp_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                        <p class="text-lg font-bold">แก้ไขข้อมูล</p>
                        <hr>
                        <div class="p-4 md:p-5 space-y-4">
                            @foreach($teams as $team)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <label for="team">ทีม</label>
                                        <img src="{{ $team['logo'] }}" alt="{{ $team['name'] }}" class="w-10 h-10 mr-2">
                                        <span class="ml-2">{{ $team['name'] }}</span>
                                    </div>
                                    <input type="text" class="border border-gray-300 rounded px-2 py-1" placeholder="คะแนน">
                                </div>
                            @endforeach
                            <div class="flex justify-center items-center">
                                <label class="mx-auto">แก้ไขเวลา</label>
                                <input type="time" name="match_time" id="match_time" class="text-gray-500 hover:text-gray-700 h-5 mr-2 ml-2"></input>
                                <label>แก้ไขวันที่</label>
                                <input type="date" name="match_date" id="match_date" class="ml-4 text-gray-500 hover:text-gray-700 h-5"></input>
                            </div>
                        </div>
                        <hr><br>
                        <div class="flex justify-center">
                            <button onclick="submitUpdateForm('{{ $cp_id }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                อัพเดต
                            </button>
                        </div>  
                    </div>
                </div>
             </form>
        @endforeach
       

        <script>
            function openModal(cp_id) {
                var modal = document.getElementById("modal-content-" + cp_id);
                modal.classList.remove("hidden");
            }
            function submitUpdateForm(cp_id) {
                var form = document.getElementById("update-form-" + cp_id);
                form.submit();
            }
            function closeModal() {
                var modal = document.querySelector(".modal-content:not(.hidden)");
                modal.classList.add("hidden");
            }
        </script>

{{--<form action="" method="POST" enctype="multipart/form-data">
    Main modal
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full translate-x-[450px] translate-y-[150px]">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        ข้อมูลการแข่งขัน
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                @foreach ($buckets as $bucket)
                    @foreach ($bucket as $innerBucket)
                        @foreach ($innerBucket as $item)
                            <div id="modal-content-{{ $item->cp_id }}-{{ $item->t_id }}"
                                class="modal-content hidden">
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <label for="team">ทีม</label>
                                            <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                            <span class="ml-2">{{ $item->t_name }}</span>
                                        </div>
                                        <input type="text" class="border border-gray-300 rounded px-2 py-1"
                                            placeholder="คะแนน">
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="text-gray-500 hover:text-gray-700">แก้ไขเวลา</button>
                                        <button class="ml-4 text-gray-500 hover:text-gray-700">แก้ไขวันที่</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">อัพเดต</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
        const modalHideButtons = document.querySelectorAll('[data-modal-hide]');
        const modal = document.getElementById('default-modal');

        // Function to show modal with specific cp_id and t_id
        const showModal = (cp_id, t_id) => {
            console.log("cp_id:", cp_id);
            console.log("t_id:", t_id);

            // Hide all modal content initially
            const modalContents = document.querySelectorAll('.modal-content');
            modalContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Show modal content with matching cp_id and t_id
            const modalContent = document.getElementById(`modal-content-${cp_id}-${t_id}`);
            if (modalContent) {
                modalContent.classList.remove('hidden');
            }

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
                // Get cp_id and t_id from data attributes
                const cp_id = button.getAttribute('data-match-id');
                const t_id = button.getAttribute('data-team-id');
                showModal(cp_id, t_id);
            });
        });

        // Event listeners for hide buttons
        modalHideButtons.forEach(button => {
            button.addEventListener('click', () => {
                hideModal();
            });
        });
    });
</script>--}}
