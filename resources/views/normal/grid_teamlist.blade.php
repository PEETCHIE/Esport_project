<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('ทีมเข้าแข่งขัน') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Navbar -->
                <div class="flex flex-nowrap border-b border-gray-200 dark:border-gray-600">
                    <div class="p-4">
                        <a href="#tab1" class="text-gray-900 dark:text-white font-bold">ทีมเข้าแข่งขัน</a>
                    </div>
                    <div class="p-4">
                        <a href="#tab2" class="text-gray-500 dark:text-gray-400 font-bold">ตารางแข่งขัน</a>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-4">
                    <!-- Content for Tab 1 -->
                    <div id="tab1" class="tab-content">
                        <div
                            class="grid grid-cols-5 grid-flow-row dark:text-gray-200 leading-tight grid-md flex flex-wrap">
                            @foreach ($team_lists as $team_list)
                                <div class="mx-auto px-5 justify-center m-3">
                                    <div
                                        class="max-w-xs cursor-pointer rounded-lg bg-[#C9193A] p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
                                        <img class="h-40 w-52 rounded-lg object-cover object-center"
                                            src="{{ $team_list->logo }}" alt="product" />
                                        <p class="my-4 pl-4 font-bold text-white">ชื่อทีม: {{ $team_list->t_name }}</p>
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-gray-700 text-white font-bold py-1 px-1 rounded"><a
                                                href="{{ route('team_detail', $team_list->id) }}">ข้อมูล</a></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Content for Tab 2 -->
                    <div id="tab2" class="hidden tab-content">
                        <div class="grid grid-cols-5 gap-1">
                            <div>
                                <h1>ROUND 1</h1>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3">
                                        @foreach ($bucket['R1'] as $item)
                                            <br>
                                            <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                                                <div class="flex items-center justify-center mx-auto">
                                                    <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                                    <span class="ml-2">{{ $item->t_name }}</span>
                                                </div>
                                                <div
                                                    class="border bg-white text-black flex items-center justify-center w-10">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="absolute transform translate-x-[80px] -translate-y-[52px]">
                        <div>VS</div>
                    </div>
                                @endforeach
                            </div>

                            <div>
                                <h1>ROUND 2</h1>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3">
                                        @foreach ($bucket['R2'] as $item)
                                            <br>
                                            <div
                                                class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                                                <div class="flex items-center justify-center mx-auto">
                                                    <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                                    <span class="ml-2">{{ $item->t_name }}</span>
                                                </div>
                                                <div
                                                    class="border bg-white text-black flex items-center justify-center w-10">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="absolute transform translate-x-[53px] -translate-y-[52px]">
                        <div>VS</div>
                    </div>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <h1>ROUND 3</h1>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3">
                                        @foreach ($bucket['R3'] as $item)
                                            <br>
                                            <div
                                                class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                                                <div class="flex items-center justify-center mx-auto">
                                                    <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                                    <span class="ml-2">{{ $item->t_name }}</span>
                                                </div>
                                                <div
                                                    class="border bg-white text-black flex items-center justify-center w-10">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="absolute transform translate-x-[53px] -translate-y-[52px]">
                        <div>VS</div>
                    </div>
                                    </div>
                                @endforeach

                            </div>
                            <div>
                                <h1>ROUND 4</h1>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3">
                                        @foreach ($bucket['R4'] as $item)
                                            <br>
                                            <div
                                                class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                                                <div class="flex items-center justify-center mx-auto">
                                                    <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                                    <span class="ml-2">{{ $item->t_name }}</span>
                                                </div>
                                                <div
                                                    class="border bg-white text-black flex items-center justify-center w-10">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="absolute transform translate-x-[53px] -translate-y-[52px]">
                        <div>VS</div>
                    </div>
                                    </div>
                                @endforeach

                            </div>
                            <div>
                                <h1>ROUND 5</h1>
                                @foreach ($buckets as $bucket)
                                    <div class="mx-8 w-36 grid-cols-4 gap-3">
                                        @foreach ($bucket['R5'] as $item)
                                            <br>
                                            <div
                                                class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                                                <div class="flex items-center justify-center mx-auto">
                                                    <img src="{{ $item->logo }}" class="w-5 h-5" alt="">
                                                    <span class="ml-2">{{ $item->t_name }}</span>
                                                </div>
                                                <div
                                                    class="border bg-white text-black flex items-center justify-center w-10">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="absolute transform translate-x-[53px] -translate-y-[52px]">
                        <div>VS</div>
                    </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // เลือกทุกลิงก์ของแท็บ
            const tabLinks = document.querySelectorAll('.flex .p-4 a');

            // ฟังก์ชันสำหรับการเปิดแท็บ
            function openTab(e) {
                e.preventDefault();
                const tabId = this.getAttribute('href').replace('#', '');
                const tabContent = document.getElementById(tabId);

                // ปิดแท็บทั้งหมด
                document.querySelectorAll('.tab-content').forEach(function(tab) {
                    tab.classList.add('hidden');
                });

                // เปิดแท็บที่ถูกคลิก
                tabContent.classList.remove('hidden');
            }

            // แนบการคลิกไปยังทุกลิงก์ของแท็บ
            tabLinks.forEach(function(link) {
                link.addEventListener('click', openTab);
            });
        });
    </script>
</x-app-layout>
