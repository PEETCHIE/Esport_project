<nav x-data="{ open: false }" class="bg-slate-800 dark:bg-gray-800 border-gray-100 dark:border-gray-700 fixed w-full">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-28">
            <div class="flex">
                <!-- Logo -->    
                <div class="shrink-0 flex items-center ">
                        <div class="w-24 h-20">
                            <img src="{{ url('img/Logo.png')}}" alt="" >
                        </div>
                </div>
                @guest
                    <!-- Navigation Links -->
                    <div class="hidden space-x-3 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('contestants')" :active="request()->routeIs('contestants')">
                            {{ __('รายการแข่งขัน') }}
                        </x-nav-link>
                        <x-nav-link :href="route('twitch-streams')" :active="request()->routeIs('contestants')">
                            {{ __('ถ่ายทอดสด') }}
                        </x-nav-link>
                    </div>

                  

                    @if (Route::has('login'))
                    <div class="flex items-center">
                        <div class="hidden sm:fixed sm:flex sm:ms-6 sm:top-0 sm:right-0 p-11 text-right z-10">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="font-semiboldx  text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                
                            @else
                                <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                    @endif
                   
                    
                @else
                    @if(auth()->check() && auth()->user()->role == 'admin')
                        <!-- Navigation Links -->
                        <div class="hidden space-x-3 sm:-my-px sm:ms-10 sm:flex ">
                            <x-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
                                {{ __('หน้าหลัก') }}
                            </x-nav-link>

                            <x-nav-link :href="route('list_tmg')" :active="request()->routeIs('list_tmg')">
                                {{ __('รายชื่อร้องขอเป็นผู้จัดการแข่ง') }}
                            </x-nav-link>
                        </div>

                    @endif

                    @if(auth()->check() && auth()->user()->role == 'manager')
                        <!-- Navigation Links -->
                        <div class="hidden space-x-3 sm:-my-px sm:ms-10 sm:flex ">
                            <x-nav-link :href="route('manager.home')" :active="request()->routeIs('manager.home')">
                                {{ __('หน้าหลัก') }}
                            </x-nav-link>

                            <x-nav-link :href="route('managers_competition.index')" :active="request()->routeIs('managers_competition.index')">
                                {{ __('จัดการแข่งขัน') }}
                            </x-nav-link>
                        </div>

                    @endif
                
                    @if(auth()->check() && auth()->user()->role == 'normal')
                        <!-- Navigation Links -->
                        <div class="hidden space-x-3 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('normal.home')" :active="request()->routeIs('normal.home')">
                                {{ __('หน้าหลัก') }}
                            </x-nav-link>

                            <x-nav-link :href="route('contestants.index')" :active="request()->routeIs('tmg')">
                                {{ __('รายการแข่งขัน') }}
                            </x-nav-link>

                            <x-nav-link :href="route('managerRegister.create')" :active="request()->routeIs('tmg')">
                                {{ __('ลงทะเบียนเป็นผู้จัดการแข่ง') }}
                            </x-nav-link>
                        </div>
                    
                    @endif
                
            </div>
            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endguest
    </div>
</nav>
