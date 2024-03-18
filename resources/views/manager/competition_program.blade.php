<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('จัดการตารางข้อมูลการแข่งขัน') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-4 gap-1">
        <div>
            @foreach($buckets as $bucket)
                <div class="mx-8 w-48 grid-cols-4 gap-3">
                    @foreach($bucket['R1'] as $item)
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
                    <div class="absolute transform translate-x-1 -translate-y-[28px]">
                        <button onclick="openScoreModal('{{ $item->cp_id }}-{{ $item->t_id }}')" class="px-3 py-2 text-xs font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            คะแนน
                        </button>
                    </div>
                    @endforeach
                    <div class="absolute transform translate-x-[70px] -translate-y-[54px]">
                        <button onclick="openEditModal('{{ $item->cp_id }}-{{ $item->t_id }}')" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-[200px]">
                            แก้ไข
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
            <!-- <div class="absolute translate-x-[50px] translate-y-[130px]">
                <div class="border-t-[3px] w-[100px] -translate-y-[67px] translate-x-[249px]"></div>
                <div class="border-t-[3px] w-[100px]  translate-y-8 translate-x-[249px]"></div>
                <div class="border-r-[3px] h-[104px] -translate-y-[72px] translate-x-[250px]"></div>
                <div class="border-t-[3px] w-[25px] -translate-y-[125px] translate-x-[350px]"></div>
            </div> -->
        <div>
            @foreach($buckets as $bucket)
                <div class="mx-8 w-48 grid-cols-4 gap-3 mt-[55px]">
                    @foreach($bucket['R2'] as $item)
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
                <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
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
                <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
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

<!--Team&Score--> 
@foreach($buckets as $bucket)
    @foreach($bucket as $innerBucket)
        @foreach($innerBucket as $item)
            <div id="score-modal-{{ $item->cp_id }}-{{ $item->t_id }}" class="modal-content hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg w-1/2 md:w-1/3 p-4 md:p-5 space-y-4 relative">
                    <button onclick="closeModal()" class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 w-[50px] h-[50px]">
                        &times;
                    </button>
                    <form id="update-form-{{ $item->cp_id }}-{{ $item->t_id }}" action="{{ route('update_competition_program',  $item->cp_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <p class="text-lg font-bold">คะแนน</p>
                        <hr>
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <label for="team">ทีม</label>
                                    <img src="{{ $item->logo }}" alt="{{ $item->t_name }}" class="w-10 h-10 mr-2">
                                    <span class="ml-2">{{ $item->t_name }}</span>
                                </div>
                                <button onclick="UPscore('{{ $item->cp_id }}')" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    1+
                                </button>
                                <span class="ml-2">คะแนน</span>
                            </div>
                        </div>
                        <hr><br>
                        <div class="flex justify-center">
                            <button onclick="submitUpdateForm('{{ $item->cp_id }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                อัพเดต
                            </button>
                        </div>  
                    </form>
                </div>
            </div>
        @endforeach
    @endforeach
@endforeach
<script>
    function openScoreModal(cp_id) {
        var modal = document.getElementById("score-modal-" + cp_id);
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

<!--Link&TimeDate-->           
@foreach($buckets as $bucket)
    @foreach($bucket as $innerBucket)
        @foreach($innerBucket as $item)
            <div id="edit-modal-{{ $item->cp_id }}-{{ $item->t_id }}" class="modal-content hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg w-1/2 md:w-1/3 p-4 md:p-5 space-y-4 relative">
                    <button onclick="closeModal()" class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 w-[50px] h-[50px]">
                        &times;
                    </button>
                    <form id="update-form-Link-{{ $item->cp_id }}-{{ $item->t_id }}" action="{{ route('update_competition_program',  $item->cp_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <p class="text-lg font-bold">แก้ไขข้อมูล</p>
                        <hr>
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <label class="mx-auto">ลิ้งค์</label>
                                    <input type="text" name="link" class="w-[400px] bg-gray-50 border border-gray-300 ml-4">
                                </div>
                            </div>
                            <div class="flex justify-center items-center">
                                <label class="mx-auto">แก้ไขเวลา</label>
                                <input type="time" name="match_time" id="match_time" class="text-gray-500 hover:text-gray-700 h-5 mr-2 ml-2">
                                <label class="mx-auto">แก้ไขวันที่</label>
                                <input type="date" name="match_date" id="match_date" class="ml-4 text-gray-500 hover:text-gray-700 h-5">
                            </div>
                        </div>
                        <hr><br>
                        <div class="flex justify-center">
                            <button onclick="submitUpdateForm('{{ $item->cp_id }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                อัพเดต
                            </button>
                        </div>  
                    </form>
                </div>
            </div>
        @endforeach
    @endforeach
@endforeach
<script>
    function openEditModal(cp_id) {
        var modal = document.getElementById("edit-modal-" + cp_id);
        modal.classList.remove("hidden");
    }
    function submitUpdateForm(cp_id) {
        var form = document.getElementById("update-form-Link-" + cp_id);
        form.submit();
    }
    function closeModal() {
        var modal = document.querySelector(".modal-content:not(.hidden)");
        modal.classList.add("hidden");
    }    
</script>
