<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col" style="background-image: url('{{asset('images/php_logo.png')}}'); background-size:60%; background-position: left top; background-repeat: no-repeat;">
<header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                >
                    Dashboard
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
<div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
    <main class="flex max-w-[1/2] w-full flex-col-reverse lg:max-w-6xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="font-medium text-xl">Head first in PHP</h1>
            <h4 class="mb-3 text-[#706f6c]">Transpiră detaliile</h4>
            <p class="mb-4">Învață conceptele teoretice PHP prin exemple practice. De la conceptele de bază până la cele mai abstracte care îți dau bătăi de cap.</p>

            <!-- Tabs Navigation -->
            <div class="mb-4 -mx-1">
                <div class="flex flex-wrap gap-2" role="tablist">
                    @foreach($tabs as $index => $tab)
                        <button
                            type="button"
                            role="tab"
                            aria-selected="{{ $index === $activeTab ? 'true' : 'false' }}"
                            aria-controls="tabpanel-{{ $index }}"
                            data-tab-index="{{ $index }}"
                            class="tab-button px-3 py-1.5 text-sm font-medium rounded-sm transition-all cursor-pointer
                                           {{ $index === $activeTab
                                              ? 'bg-[#1b1b18] text-white dark:bg-[#eeeeec] dark:text-[#1C1C1A]'
                                              : 'bg-transparent text-[#706f6c] hover:text-[#1b1b18] dark:text-[#A1A09A] dark:hover:text-[#EDEDEC] hover:bg-[#f5f5f5] dark:hover:bg-[#1C1C1A]' }}"
                            onclick="switchTab({{ $index }})"
                        >
                            {{ $tab['name'] }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Tab Panels -->
            @foreach($tabs as $index => $tab)
                <div
                    id="tabpanel-{{ $index }}"
                    role="tabpanel"
                    class="tab-panel {{ $index !== $activeTab ? 'hidden' : '' }}"
                >
                    <ul class="flex flex-col mb-4 lg:mb-6">
                        @foreach($tab['links'] as $linkIndex => $link)
                            <li class="flex items-center gap-4 py-2 relative {{ $linkIndex < count($tab['links']) - 1 ? 'before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute' : '' }}">
                                        <span class="relative py-1 bg-white dark:bg-[#161615]">
                                            <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                                <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                            </span>
                                        </span>
                                <span>
                                            <a href="{{ $link['link'] }}" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433]">
                                                <span>{{ $link['page'] }}</span>
                                                @include('partials._link_icon')
                                            </a>
                                        </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
            <img src="{{asset('images/z0_logo.jpg')}}" alt="Z0 Logo" class="h-full">
            <div class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
        </div>
    </main>
</div>

@if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
@endif

<script>
    function switchTab(index) {
        // Hide all panels
        document.querySelectorAll('.tab-panel').forEach(panel => {
            panel.classList.add('hidden');
        });

        // Remove active state from all buttons
        document.querySelectorAll('.tab-button').forEach(button => {
            button.setAttribute('aria-selected', 'false');
            button.classList.remove('bg-[#1b1b18]', 'text-white', 'dark:bg-[#eeeeec]', 'dark:text-[#1C1C1A]');
            button.classList.add('bg-transparent', 'text-[#706f6c]', 'hover:text-[#1b1b18]', 'dark:text-[#A1A09A]', 'dark:hover:text-[#EDEDEC]', 'hover:bg-[#f5f5f5]', 'dark:hover:bg-[#1C1C1A]');
        });

        // Show selected panel
        const selectedPanel = document.getElementById(`tabpanel-${index}`);
        if (selectedPanel) {
            selectedPanel.classList.remove('hidden');
        }

        // Add active state to selected button
        const selectedButton = document.querySelector(`[data-tab-index="${index}"]`);
        if (selectedButton) {
            selectedButton.setAttribute('aria-selected', 'true');
            selectedButton.classList.remove('bg-transparent', 'text-[#706f6c]', 'hover:text-[#1b1b18]', 'dark:text-[#A1A09A]', 'dark:hover:text-[#EDEDEC]', 'hover:bg-[#f5f5f5]', 'dark:hover:bg-[#1C1C1A]');
            selectedButton.classList.add('bg-[#1b1b18]', 'text-white', 'dark:bg-[#eeeeec]', 'dark:text-[#1C1C1A]');
        }
    }
</script>
</body>
</html>
