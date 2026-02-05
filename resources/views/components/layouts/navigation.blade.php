<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-slate-950/80 backdrop-blur-md border-b border-slate-800/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-2xl font-black tracking-tighter text-white group">
                    CHIRP<span class="text-indigo-500 group-hover:text-indigo-400 transition-colors">ER</span>
                </a>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex h-full">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-800 text-sm font-medium rounded-full text-slate-300 bg-slate-900/40 hover:bg-slate-800 hover:text-white transition duration-200 shadow-lg">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-tr from-indigo-600 to-purple-600 flex items-center justify-center text-[10px] text-white mr-2">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-slate-800">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-rose-400 hover:bg-rose-500/10">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>