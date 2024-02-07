<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Competition Program') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-4 gap-4">
        <div class="mx-8 w-48 grid-cols-3 gap-3">
            <b>01</b><br>
            <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                <img src="path/to/your/image.jpg" alt="">
                <span class="ml-2">Team 1</span>
                <div class="border bg-white text-black flex items-center justify-center w-10">
                    0
                </div>
            </div>

            <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">score</button>

            <div class="border rounded bg-[#01142E] border-[#01142E] text-white flex justify-between grid-cols-2 gap-2">
                <img src="path/to/your/image.jpg" alt="">
                <span class="ml-2">Team 2</span>
                <div class="border bg-white text-black flex items-center justify-center w-10">
                    0
                </div>
            </div>
       
        </div>
        <!-- ... -->
        <div>
            <b>02</b>

        </div>
        <!-- ... -->
        <div>
            <b>03</b>

        </div>
        <!-- ... -->
        <div>
            <b>04</b>

        </div>
    </div>




    
    {{-- @if(isset($alert))
    <div class="alert alert-{{ $alert['icon'] }}">
        <strong>{{ $alert['title'] }}</strong> {{ $alert['text'] }}
    </div>
    @endif --}}
   
</x-app-layout>

<script>
    
    // @if(session('alert'))
    //         Swal.fire({
    //             icon: '{{ session('alert')['icon'] }}',
    //             title: '{{ session('alert')['title'] }}',
    //             text: '{{ session('alert')['text'] }}',
    //         });
    //     @endif
</script>