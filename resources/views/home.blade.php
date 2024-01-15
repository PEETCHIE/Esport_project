
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __() }}
        </h2>
    </x-slot>
    <div class="w-30 h-50">
        <img src="{{ url('img/bg_head.png')}}" alt="">
    </div>
    
    <div class="flex justify-center p-8">
        <div class="px-8">
            <img src="{{ url('img/news1.png')}}" alt="" >
            <a href="#"><p>ทีมน้องใหม่อย่าง BELIKE เอาชนะแชมป์เก่าอย่าง</p>POPPA ไปอย่างช็อคโลก</a>
        </div>
        <div class="px-8">
            <img src="{{ url('img/news2.png')}}" alt="" >
            <a href="#"><p>มทร. เปิดรับสมัครการแข่งขัน ROV เชิญชวนน้อง</p>นักศึกษามาเข้าร่วมการแข่งในรายการนี้</a>
        </div>
        <div class="px-8">
            <img src="{{ url('img/news3.png')}}" alt="" >
            <a href="#"><p>จะมีการเปิดการแข่งขันอีกครั้งในปี 2024 ปลายเดือน</p>กุมภาพันธ์ โปรดรอการประกาศจากทีมงาน</a>
        </div>
    </div>
    <div class="grid justify-items-center">
        <div>
            <img src="{{ url('img/bg_register.png')}}" alt="">
        </div>
        <div class="pt-6">
            <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-rose-600 py-1 px-1 rounded text-xl" id="swal">ลงทะเบียน</button>
        </div>
    </div>
    <script>
        document.getElementById('swal').addEventListener('click', function(){
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
            });
        })
    </script>
    
    

</x-app-layout>