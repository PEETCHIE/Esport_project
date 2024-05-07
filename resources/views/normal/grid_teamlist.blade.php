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
                                        class="max-w-xs cursor-pointer rounded-lg bg-gradient-to-r from-slate-900 to-slate-500 p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
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
                                            <div
                                                class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                                                <span class="flex justify-start p-1 text-white text-[12px] whitespace-nowrap">{{ $item->t_name }}</span>                       
                                                <div class="relative">
                                                    <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[5px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                                                </div>
                                                <div class="p-1 shrink-0">
                                                    <div class="relative inset-y-0 left-[9px]">
                                                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">     
                                                    </div>  
                                                </div> 
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[60px] -translate-y-[52px]">
                                                    <div>VS</div>
                                                </div>
                                                <div class="absolute transform translate-x-[-50px] -translate-y-[54px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
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
                                                class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                                                <span class="flex justify-start p-1 text-white text-[12px] whitespace-nowrap">{{ $item->t_name }}</span>                       
                                                <div class="relative">
                                                    <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[5px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                                                </div>
                                                <div class="p-1 shrink-0">
                                                    <div class="relative inset-y-0 left-[9px]">
                                                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">     
                                                    </div>  
                                                </div> 
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[60px] -translate-y-[52px]">
                                                    <div>VS</div>
                                                </div>
                                                <div class="absolute transform translate-x-[-50px] -translate-y-[54px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
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
                                                class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                                                <span class="flex justify-start p-1 text-white text-[12px] whitespace-nowrap">{{ $item->t_name }}</span>                       
                                                <div class="relative">
                                                    <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[5px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                                                </div>
                                                <div class="p-1 shrink-0">
                                                    <div class="relative inset-y-0 left-[9px]">
                                                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">     
                                                    </div>  
                                                </div> 
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[60px] -translate-y-[52px]">
                                                    <div>VS</div>
                                                </div>
                                                <div class="absolute transform translate-x-[-50px] -translate-y-[54px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
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
                                                class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                                                <span class="flex justify-start p-1 text-white text-[12px] whitespace-nowrap">{{ $item->t_name }}</span>                       
                                                <div class="relative">
                                                    <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[5px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                                                </div>
                                                <div class="p-1 shrink-0">
                                                    <div class="relative inset-y-0 left-[9px]">
                                                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">     
                                                    </div>  
                                                </div> 
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[60px] -translate-y-[52px]">
                                                    <div>VS</div>
                                                </div>
                                                <div class="absolute transform translate-x-[-50px] -translate-y-[54px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
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
                                                class="border bg-gradient-to-r from-slate-800 to-slate-300 text-white flex justify-between grid-cols-3 gap-2">
                                                <span class="flex justify-start p-1 text-white text-[12px] whitespace-nowrap">{{ $item->t_name }}</span>                       
                                                <div class="relative">
                                                    <div class="rounded-full bg-[#ffff] w-[50px] absolute inset-y-0 left-[5px]"  style="border-radius: 0% 0% 0% 85% / 0% 0% 100% 100%;"></div>
                                                </div>
                                                <div class="p-1 shrink-0">
                                                    <div class="relative inset-y-0 left-[9px]">
                                                        <img src="{{ $item->logo }}" class="w-5 h-5" alt="">     
                                                    </div>  
                                                </div> 
                                                <div class="border border-[#C9193A] bg-[#C9193A] text-black flex items-center justify-center w-8">
                                                    {{ $item->score }}
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 == 0)
                                                <div class="absolute transform translate-x-[60px] -translate-y-[52px]">
                                                    <div>VS</div>
                                                </div>
                                                <div class="absolute transform translate-x-[-50px] -translate-y-[54px]">
                                                    <button onclick="Link('{{ $item->cp_id }}-{{ $item->t_id }}', '{{ $item->link }}')" target="_blank" class="px-1 py-1 text-xs font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 dark:bg-blue-600 dark:hover:bg-rose-700 dark:focus:ring-rose-800 ml-[200px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            @endif
                                        @endforeach
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
    <!--ButtonLink-->
    <script>
        function Link(cp_id_t_id, url) {
        // Split cp_id_t_id into cp_id and t_id
        var cp_id_t_id_arr = cp_id_t_id.split('-');
        var cp_id = cp_id_t_id_arr[0];
        var t_id = cp_id_t_id_arr[1];
        
        // Check if the URL is defined
        if (url) {
            // Open the URL in a new tab
            window.open(url, '_blank');
        } else {
            // If the URL is not defined, display a message
            // swal("ยังไม่มีลิ้งค์ถ่ายทอดสด");
            Swal.fire({
                title: "ยังไม่มีลิ้งค์ถ่ายทอดสด.",
                width: 600,
                padding: "3em",
                color: "#716add",
                background: "#fff url(/images/trees.png)",
                backdrop: `
                    rgba(0,0,123,0.4)
                    url("/images/nyan-cat.gif")
                    left top
                    no-repeat
                `
                });
        }
    }
    </script>

    <!--TabBar-->
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

            // ฟังก์ชันสำหรับเปลี่ยนสีของแท็บ
            function changeTabColor(tab) {
                tabLinks.forEach(function(link) {
                    link.style.color = tab === link ? '#000' : '#555'; // ถ้าแท็บที่ถูกคลิกให้เป็นสีดำ ไม่เช่นนั้นให้เป็นสีดำอ่อน
                });
            }

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

                // เรียกใช้งานฟังก์ชันเปลี่ยนสีแท็บ
                changeTabColor(this);
            }

            // แนบการคลิกไปยังทุกลิงก์ของแท็บ
            tabLinks.forEach(function(link) {
                link.addEventListener('click', openTab);
            });
        });
    </script>
</x-app-layout>
