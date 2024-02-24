<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('จัดการแข่งขัน') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-4xl  p-4 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('managers_competition.store') }}" method="POST" enctype="multipart/form-data"
                        id="registrationForm">
                        <div class="container mx-auto">
                            @csrf
                            <div class="grid grid-cols-4 grid-flow-row">
                                <div class="cols mx-1 col-span-1">
                                    <x-input-label for="competition_name"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อรายการแข่งขัน</x-input-label>
                                    <input type="text" name="competition_name" id="competition_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('competition_name')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-1">
                                    <x-input-label for="opening_date"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่เปิดรับสมัคร</x-input-label>
                                    <input type="date" name="opening_date" id="opening_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('opening_date')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-1">
                                    <x-input-label for="end_date"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่ปิดรับสมัคร</x-input-label>
                                    <input type="date" name="end_date" id="end_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                                </div>

                                <div class="cols mx-1 col-span-1">
                                    <x-input-label for="game_name"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">ชื่อเกม</x-input-label>
                                    <input type="text" name="game_name" id="game_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('game_name')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-2">
                                    <x-input-label for="start_date"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่เริ่มการแข่งขัน</x-input-label>
                                    <input type="date" name="start_date" id="start_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-2">
                                    <x-input-label for="competition_end_date"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">วันที่สิ้นสุดการแข่งขัน</x-input-label>
                                    <input type="date" name="competition_end_date"
                                        id="competition_end_date"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('competition_end_date')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-1">
                                    <label for="cl_round"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">รูปแบบการแข่งขัน</label>
                                    <select id="cl_round" name="cl_round"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>เลือกรูปแบบการแข่ง</option>
                                        <option value="1">BEST OF 1</option>
                                        <option value="3">BEST OF 3</option>
                                        <option value="5">BEST OF 5</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('cl_round')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-1">
                                    <x-input-label for="competition_amount"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">จำนวนทีมที่รับสมัคร</x-input-label>
                                    <select id="competition_amount" name="competition_amount"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>เลือกจำนวนทีมที่ต้องการ</option>
                                        <option value="8">8 ทีม</option>
                                        <option value="16">16 ทีม</option>
                                        <option value="32">32 ทีม</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('competition_amount')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-2 ">
                                    <label for="amount_contestant"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">จำนวนผู้เข้าแข่งขัน</label>
                                    <select id="amount_contestant" name="amount_contestant"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>เลือกจำนวนผู้เข้าแข่งขัน</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('amount_contestant')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-2 ">
                                    <label for="competition_rule"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">กฎกติกาการแข่งขัน</label>
                                    <textarea name="competition_rule" id="competition_rule" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 
                                        bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 
                                        focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="กฎกติกาการแข่งขัน"></textarea>
                                    <x-input-error :messages="$errors->get('competition_rule')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-1 ">
                                    <x-input-label for="cl_img"
                                        class="block  text-sm font-medium text-gray-900 dark:text-white py-2">โลโก้ทีม</x-input-label>
                                    <input type="file" name="cl_img" onChange="loadFile(event)" id="cl_img"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <x-input-error :messages="$errors->get('cl_img')" class="mt-2" />
                                </div>

                                <div class="cols mx-1  col-span-1 ml-12">
                                    <img id="output" class="h-48 w-48 rounded-lg py-2" />
                                </div>
                            </div>

                            <div class="cols col-span-3 text-center">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded text-xl"
                                    id="wait">ลงทะเบียน</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showError(message) {
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: message,
            });
        }
        document.getElementById('wait').addEventListener('click', function(event) {
            event.preventDefault();
            var competition_name = document.getElementById('competition_name').value;
            var opening_date = document.getElementById('opening_date').value;
            var end_date = document.getElementById('end_date').value;
            var game_name = document.getElementById('game_name').value;
            var start_date = document.getElementById('start_date').value;
            var competition_end_date = document.getElementById('competition_end_date').value;
            var cl_round = document.getElementById('cl_round').value;
            var competition_amount = document.getElementById('competition_amount').value;
            var amount_contestant = document.getElementById('amount_contestant').value;
            var competition_rule = document.getElementById('competition_rule').value;
            var cl_img = document.getElementById('cl_img').value;

            if (competition_name === '' || opening_date === '' || end_date === '' || game_name === '' ||
                start_date === '' || competition_end_date === '' ||
                cl_round === '' || competition_amount === '' || amount_contestant === '' || competition_rule ===
                '' || cl_img === '') {
                showError('กรุณากรอกข้อมูลให้ครบถ้วน');
            } else {
                Swal.fire({
                    title: "เพิ่มรายการแข่งขันเรียบร้อย",
                    text: "คุณสามารถแก้ไขภายหลังได้",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('registrationForm').submit();
                    }
                });
            }
        });
    </script>
</x-app-layout>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0])
    }
</script>
