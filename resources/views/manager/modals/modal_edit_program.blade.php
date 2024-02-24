@foreach ($teamsWithSameCpId as $cp_id => $teams)
    <div id="modal-content-{{ $cp_id }}"
        class="modal-content hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg w-1/2 md:w-1/3 p-4 md:p-5 space-y-4 relative">
            <button onclick="closeModal()"
                class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 w-[50px] h-[50px]">
                &times;
            </button>
            <form id="update-form-{{ $cp_id }}" action="{{ route('update_competition_program', $cp_id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <p class="text-lg font-bold">แก้ไขข้อมูล</p>
                <hr>
                <div class="p-4 md:p-5 space-y-4">
                    @foreach ($teams as $team)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <label for="team">ทีม</label>
                                <p>{{ $team['id'] }}</p>
                                <img src="{{ $team['logo'] }}" alt="{{ $team['name'] }}" class="w-10 h-10 mr-2">
                                <span class="ml-2">{{ $team['name'] }}</span>
                            </div>
                            <input type="text" class="border border-gray-300 rounded px-2 py-1" placeholder="คะแนน">
                        </div>
                    @endforeach

                    <div class="flex justify-center items-center">
                        <label class="mx-auto">แก้ไขเวลา</label>
                        <input type="time" name="match_time" id="match_time"
                            class="text-gray-500 hover:text-gray-700 h-5 mr-2 ml-2"></input>
                        <label>แก้ไขวันที่</label>
                        <input type="date" name="match_date" id="match_date"
                            class="ml-4 text-gray-500 hover:text-gray-700 h-5"></input>
                    </div>
                </div>
                <hr><br>
                <div class="flex justify-center">
                    <button onclick="submitUpdateForm('{{ $cp_id }}')"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
