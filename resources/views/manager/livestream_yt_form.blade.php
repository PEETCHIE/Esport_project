<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg shadow-red-400">
            <div class="flex justify-end">
                <a href="/asset/PDF/DataDic-_6.pdf" target="_blank">
                    <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">คู่มือการใช้งาน</button>
                </a>
            </div>
            <h2 class="text-xl font-semibold mb-4">YOUTUBE</h2>
            <form id="youtubeForm" class="space-y-4" action="{{ route('storeYoutubeAPI') }}" method="POST">
                @csrf
                <div>
                    <label for="channel_name" class="block font-medium text-gray-700">channel_name</label>
                    <input type="text" id="channel_name" name="channel_name"
                        class="form-input mt-1 block w-full rounded-lg">
                </div>
                <div>
                    <label for="channel_id" class="block font-medium text-gray-700">channel_id:</label>
                    <input type="text" id="channel_id" name="channel_id"
                        class="form-input mt-1 block w-full rounded-lg">
                </div>
                <div>
                    <label for="api_key" class="block font-medium text-gray-700">api_key:</label>
                    <input type="text" id="api_key" name="api_key"
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