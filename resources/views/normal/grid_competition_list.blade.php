<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('REGISTER CONPETITIONS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($message = Session::get('status'))
        <center><div>
            <div class="mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{ $message}}</span> 
            </div>
        </div></center>
        @endif
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="grid grid-cols-5 grid-flow-row dark:text-gray-200 leading-tight grid-md flex flex-wrap">
                @foreach($competition_lists as $competition_list)        
                    <div class="mx-auto px-5 justify-center m-3">
                        <div class="max-w-xs cursor-pointer rounded-lg bg-white p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
                        <img class="w-full rounded-lg object-cover object-center" src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="product" />
                        <p class="my-4 pl-4 font-bold text-gray-500">{{ $competition_list->competition_name}}</p>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded " onclick="#"><a href="{{ route('competition.detail', $competition_list->id)}}">DETAIL</a></button>
                        </div>
                        
                    </div>
                @endforeach            
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>