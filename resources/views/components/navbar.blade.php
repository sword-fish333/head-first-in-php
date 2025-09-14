<nav x-data="{ mobileMenuOpen: false }"
     class="sticky top-0 z-50 w-full border-b border-[#706f6c]/20 bg-white/95 backdrop-blur-sm transition-all duration-200 dark:border-[#706f6c]/10 dark:bg-[#1b1b18]/95">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo/Brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3">
                    <img src="{{asset('images/z0_only_logo.png')}}" alt="{{config('app.name')}}"
                         class="h-10 rounded-lg">
                    <span class="text-xl font-medium  dark:text-white">{{config('app.name')}}</span>
                </a>
                <div class="hidden items-center space-x-8 md:flex ml-5">
                    <a href="/"
                       class="tab-button px-3 py-1.5 text-sm font-medium rounded-sm transition-all cursor-pointer bg-transparent text-[#706f6c] hover:text-[#1b1b18] dark:text-[#A1A09A] dark:hover:text-[#EDEDEC] hover:bg-[#f5f5f5] dark:hover:bg-[#1C1C1A]">Home</a>
                </div>
            </div>
            <!-- Right side items -->
            <div class="flex items-center space-x-4">
                <!-- Language Dropdown -->
                <div class="relative" >
                    <button
                        onclick="toggleLangDropdown()"
                            class="flex cursor-pointer items-center space-x-2 rounded-lg border border-[#706f6c]/20 bg-white px-3 py-2 text-sm font-medium text-[#706f6c]
                             transition-all hover:border-[#706f6c]/40 hover:bg-[#f5f5f5] dark:border-[#706f6c]/10 dark:bg-[#2a2a27] dark:text-[#706f6c]
                             dark:hover:border-[#706f6c]/30 dark:hover:bg-[#333330]">
                        <img src="{{asset('/images/flags/gb.svg')}}" alt="English" class="h-4 w-6 rounded">
                        <span>EN</span>
                        <span class="material-symbols-outlined text-base transition-transform"
                       >expand_more</span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="lang_dropdown" class="absolute hidden right-0 mt-2 w-48 origin-top-right rounded-lg border border-[#706f6c]/20 bg-white shadow-lg ring-1 ring-black ring-opacity-5 dark:border-[#706f6c]/10 dark:bg-[#2a2a27]">
                        <div class="py-1">
                            <a href="{{route('change-lang',['lang'=>'en'])}}"
                               class="flex items-center space-x-3 px-4 py-2 text-sm text-[#1b1b18] hover:bg-[#f5f5f5] dark:text-white dark:hover:bg-[#333330]">
                                <img src="{{asset('images/flags/gb.svg')}}" alt="English" class="h-4 w-6 rounded">
                                <span>English</span>
                            </a>
                            <a href="{{route('change-lang',['lang'=>'ro'])}}"
                               class="flex items-center space-x-3 px-4 py-2 text-sm text-[#1b1b18] hover:bg-[#f5f5f5] dark:text-white dark:hover:bg-[#333330]">
                                <img src="{{asset('images/flags/ro.svg')}}" alt="Română" class="h-4 w-6 rounded">
                                <span>Română</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()"
                        class="rounded-lg p-2 text-[#706f6c] transition-colors hover:bg-[#f5f5f5] hover:text-[#1b1b18] dark:text-[#706f6c] dark:hover:bg-[#333330] dark:hover:text-white">
                    <span class="material-symbols-outlined dark:hidden">dark_mode</span>
                    <span class="material-symbols-outlined hidden dark:block">light_mode</span>
                </button>

                <!-- Mobile Menu Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="rounded-lg p-2 text-[#706f6c] transition-colors hover:bg-[#f5f5f5] hover:text-[#1b1b18] dark:text-[#706f6c] dark:hover:bg-[#333330] dark:hover:text-white md:hidden">
                    <span class="material-symbols-outlined" x-show="!mobileMenuOpen">menu</span>
                    <span class="material-symbols-outlined" x-show="mobileMenuOpen">close</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 -translate-y-2"
         x-transition:enter-end="transform opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="transform opacity-100 translate-y-0"
         x-transition:leave-end="transform opacity-0 -translate-y-2"
         class="border-t border-[#706f6c]/20 bg-white dark:border-[#706f6c]/10 dark:bg-[#1b1b18] md:hidden">
        <div class="space-y-1 px-4 pb-3 pt-2">
            <a href="/"
               class="block rounded-lg px-3 py-2 text-base font-medium text-[#706f6c] hover:bg-[#f5f5f5] hover:text-[#1b1b18] dark:text-[#706f6c] dark:hover:bg-[#333330] dark:hover:text-white">Home</a>
        </div>
    </div>
</nav>
