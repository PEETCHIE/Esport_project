<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TEAM') }}
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
                @foreach($team_lists as $team_list)        
                    <div class="mx-auto px-5 justify-center m-3">
                        <div class="max-w-xs cursor-pointer rounded-lg bg-white p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
                        <img class="h-40 w-60 rounded-lg object-cover object-center" src="{{ $team_list->logo}}" alt="product" />
                        <p class="my-4 pl-4 font-bold text-gray-500">{{ $team_list->t_name}}</p>
                        {{-- <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-1 rounded "><a href="#">TEAM</a></button> --}}
                        </div>
                    </div>
                @endforeach            
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>