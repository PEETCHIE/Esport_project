
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __() }}
        </h2>
    </x-slot>
    <div class="w-30 h-50">
        <img src="{{ url('img/bg_head.png')}}" alt="">
    </div>
    <div class="grid grid-cols-3 grid-flow-row p-8 ms-8">
        <div class="cols ">
            <img src="{{ url('img/news1.png')}}" alt="" >
            <a href="#"><p>ทีมน้องใหม่อย่าง BELIKE เอาชนะแชมป์เก่าอย่าง</p>POPPA ไปอย่างช็อคโลก</a>
        </div>
        <!-- ... -->
        <div>
            <img src="{{ url('img/news2.png')}}" alt="" >
            <a href="#"><p>มทร. เปิดรับสมัครการแข่งขัน ROV เชิญชวนน้อง</p>นักศึกษามาเข้าร่วมการแข่งในรายการนี้</a>
        </div>
        <!-- ... -->
        <div>
            <img src="{{ url('img/news3.png')}}" alt="" >
            <a href="#"><p>จะมีการเปิดการแข่งขันอีกครั้งในปี 2024 ปลายเดือน</p>กุมภาพันธ์ โปรดรอการประกาศจากทีมงาน</a>
        </div>
    </div>
    <div class="w-50 h-30 p-8">
        <img src="{{ url('img/bg_register.png')}}" alt="" >
    </div>
    <div class="text-center py-8">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-1 rounded text-xl">ลงทะเบียน</button>
    </div>

</x-app-layout>