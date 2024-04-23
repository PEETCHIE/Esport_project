<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-50 dark:text-gray-200 leading-tight">
            {{ __('หน้าหลัก') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("เข้าสู่ระบบ 'ADMIN' ") }}
                </div>
                <div class="grid grid-cols-3 ml-[50px] mb-[20px]">
                    <div>
                        ข่าว1
                        <div class="border-4 border-slate-900 rounded w-[350px] h-[200px] text-center mb-[5px]">
                            <div class="h-full w-full relative">
                                <img id="output1" class="h-full w-full object-cover rounded-lg p-1" src=""/>
                            </div>
                        </div>
                        <div class="border border-black rounded-lg w-[220px] mt-[10px] ml-[60px] mb-[10px] p-1">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-rose-50 file:text-rose-700
                                hover:file:bg-violet-100
                                " onchange="loadFile(event, 'output1')"/>
                            </label>
                        </div>
                        <textarea class="w-[310px] h-[100px] ml-[21px] block"></textarea>
                    </div>
                    <div>
                        ข่าว2
                        <div class="border-4 border-slate-900 rounded w-[350px] h-[200px] text-center mb-[5px]">
                            <div class="h-full w-full relative">
                                <img id="output2" class="h-full w-full object-cover rounded-lg p-1" src=""/>
                            </div>
                        </div>
                        <div class="border border-black rounded-lg w-[220px] mt-[10px] ml-[60px] mb-[10px] p-1">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-rose-50 file:text-rose-700
                                hover:file:bg-violet-100
                                " onchange="loadFile(event, 'output2')"/>
                            </label>
                        </div>
                        <textarea class="w-[310px] h-[100px] ml-[21px] block"></textarea>
                    </div>
                    <div>
                        ข่าว3
                        <div class="border-4 border-slate-900 rounded w-[350px] h-[200px] text-center mb-[5px]">
                            <div class="h-full w-full relative">
                                <img id="output3" class="h-full w-full object-cover rounded-lg p-1" src=""/>
                            </div>
                        </div>
                        <div class="border border-black rounded-lg w-[220px] mt-[10px] ml-[60px] mb-[10px] p-1">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-rose-50 file:text-rose-700
                                hover:file:bg-violet-100
                                " onchange="loadFile(event, 'output3')"/>
                            </label>
                        </div>
                        <textarea class="w-[310px] h-[100px] ml-[21px] block"></textarea>
                    </div>
                </div>
                <div class="border-4 border-slate-900 rounded w-[1000px] h-[200px] ml-[120px] mb-[10px]">
                    <div class="h-full w-full relative">
                        <img id="output4" class="h-full w-full object-cover rounded-lg p-1" src=""/>
                    </div>
                </div>
                    <div class="border border-black rounded-lg w-[220px] mt-[10px] ml-[510px] mb-[10px] p-1">
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-rose-50 file:text-rose-700
                            hover:file:bg-violet-100
                            "onchange="loadFile(event, 'output4')"/>
                        </label>
                    </div>
                <button class="bg-green-500 hover:bg-green-700 py-2 px-4 rounded ml-[560px] mt-[5px] mb-[30px]">เลือกรายการ</button>
                <button class="bg-green-500 hover:bg-green-700 py-2 px-4 rounded ml-[578px] mb-[20px]">อัพเดต</button>
                
            </div>
             
        </div>
    </div>
<script>
    function loadFile(event, outputId) {
        event.preventDefault(); // ป้องกันการ refresh หน้าจอ
        var output = document.getElementById(outputId);
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
</x-app-layout>
