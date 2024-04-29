<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg shadow-red-400">
            <div class="flex justify-end">
                <a href="/asset/PDF/ขั้นตอนการเตรียมข้อมูลในการถ่ายทอดสด.pdf" target="_blank">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">คู่มือการใช้งาน</button>
                </a>
            </div>
            <h2 class="text-xl font-semibold mb-4">กรุณากรอกชื่อผู้ใช้ Twitch และข้อมูลรับรองตัวตน API</h2>
            <form id="twitchForm" class="space-y-4" action="{{ route('storeTwitchAPI') }}" method="POST">
                @csrf
                <div>
                    <label for="twitch_clientId" class="block font-medium text-gray-700">Client ID:</label>
                    <input type="text" id="twitch_clientId" name="twitch_clientId"
                        class="form-input mt-1 block w-full rounded-lg">
                </div>
                <div>
                    <label for="twitch_clientSecret" class="block font-medium text-gray-700">Client Secret:</label>
                    <input type="text" id="twitch_clientSecret" name="twitch_clientSecret"
                        class="form-input mt-1 block w-full rounded-lg">
                </div>
                <div>
                    <label for="twitch_username" class="block font-medium text-gray-700">Twitch Username:</label>
                    <input type="text" id="twitch_username" name="twitch_username"
                        class="form-input mt-1 block w-full rounded-lg">
                </div>
                
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">บันทึกข้อมูล</button>
                   
                </div>

            </form>

            <div id="streamData" class="mt-4"></div>
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
