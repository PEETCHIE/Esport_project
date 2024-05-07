<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-right">
                    <form action="{{ route('generatePDF') }}" target="_blank">
                        <button
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded m-1">PDF</button>
                    </form>
                </div>

                <div class="grid grid-cols-4 pt-1">
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class=" mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-yellow-400 rounded-md px-2 text-[20px] ">
                                รายการแข่งขัน</p>
                            <p class="text-[18px] pt-4 text-dark  text-right px-2">
                                {{ $count_competition_lists }} รายการ</p>
                        </div>
                    </div>
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class=" mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-sky-500 rounded-md px-2 text-[20px]">
                                รายการแข่งขันที่ยังไม่จบ</p>
                            <p class="text-[18px] pt-4 text-dark  text-right px-2">
                                {{ $count_not_end }} รายการ</p>
                        </div>
                    </div>
                    <div class="flex ml-[20px] mb-[20px]">
                        <div class=" mt-[-1px] ml-[5px] pb-2 bg-white rounded-md border w-full">
                            <p class="text-white font-semibold bg-lime-700 rounded-md px-2 text-[20px]">
                                รายการแข่งขันที่จบแล้ว</p>
                            <p class="text-[18px] pt-4 text-dark  text-right px-2">
                                {{ $count_end }} รายการ</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 grid-flow-row gap-1 mb-16">

                    <div class="border m-2">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="border m-2 ">
                        <canvas id="mySecondChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

<script>
    @if (session('alert'))
        Swal.fire({
            icon: '{{ session('alert')['icon'] }}',
            title: '{{ session('alert')['title'] }}',
            text: '{{ session('alert')['text'] }}',
        });
    @endif
</script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = @json($data->pluck('value')); // Convert data to JSON
    function randomColor() {
        return 'rgba(' + Math.floor(Math.random() * 256) + ',' +
            Math.floor(Math.random() * 256) + ',' +
            Math.floor(Math.random() * 256) + ', 0.2)';
    }
    var backgroundColors = [];
    for (var i = 0; i < data.length; i++) {
        backgroundColors.push(randomColor());
    }
    var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: @json($labels),
            datasets: [{
                data: @json($count_teams->pluck('team_count')),
                backgroundColor: backgroundColors,
                borderWidth: 0.5
            }]
        },
        options: {
            aspectRatio: 1.5,
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    // สคริปต์สร้าง Chart ใหม่
    var ctx2 = document.getElementById('mySecondChart').getContext('2d');
    var data = @json($data->pluck('value')); // Convert data to JSON
    function randomColor() {
        return 'rgba(' + Math.floor(Math.random() * 256) + ',' +
            Math.floor(Math.random() * 256) + ',' +
            Math.floor(Math.random() * 256) + ', 0.2)';
    }
    var backgroundColors = [];
    for (var i = 0; i < data.length; i++) {
        backgroundColors.push(randomColor());
    }
    var mySecondChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'จำนวนทีมที่เข้าแข่งขันในแต่ละรายการแข่งขัน',
                data: @json($count_teams->pluck('team_count')),
                backgroundColor: backgroundColors,
                borderWidth: 1
            }]
        },
        options: {
            aspectRatio: 1.5,
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
