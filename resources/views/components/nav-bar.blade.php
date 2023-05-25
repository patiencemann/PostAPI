{{-- <overlay-loader></overlay-loader> --}}
<header class="site-header sticky top-0 z-50 border border-gray-200" style="background-image: url('/img/space-guy.jpg')">
    <div class="container transition-all">
        <div class="header-inner border border-gray-200 dark:bg-[#0b14374d] flex justify-space-between dark:bg-deep-green-800">
            <div class="flex items-center">

                {{-- MObile sidebar --}}
                <button id="toggleSidebarMobile" aria-expanded="true" data-drawer-target="drawer-navigation"
                    data-drawer-show="drawer-navigation" aria-controls="drawer-navigation"
                    class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <!-- drawer component -->
                <div id="drawer-navigation"
                    class="fixed top-0 left-0 z-40 w-80 h-screen p-6 transition-transform -translate-x-full bg-gray-50 dark:bg-gray-800"
                    tabindex="-1" aria-labelledby="drawer-navigation-label">
                    <a href="/" class="flex mt-5" data-tooltip-target="tooltip-logo-1">
                        <div class="cursor-pointer w-20">
                            <img src="/img/logos/logo-no-background.svg" alt="Patienceman Logo">
                        </div>
                    </a>
                    <div class="py-4 overflow-y-auto">
                        <div class="flex items-left flex-column">
                            <ul class="items-left justify-left flex-column p-0 mb-3">
                                <li class="lg:px-2 xl:px-3 lg:mb-0">
                                    <a target="_blank" href="https://patienceman.com"
                                        data-tooltip-target="tooltip-portifolio"
                                        class="mt-2 text-md font-medium text-gray-900 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-500 flex items-left justify-left"
                                        style="font-family: 'Anek Telugu', sans-serif; font-weight: 600">Portifolio</a>
                                    <div id="tooltip-portifolio" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                        data-popper-placement="top"
                                        style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                                        Check My portifolio
                                        <div class="tooltip-arrow" data-popper-arrow=""
                                            style="position: absolute; left: 0px; transform: translate(99px, 0px);">
                                        </div>
                                    </div>
                                </li>
                                <li class="lg:px-2 xl:px-3 lg:mb-0">
                                    <a target="_blank" href="https://twitter.com/ManirabonaW"
                                        data-tooltip-target="tooltip-twitter"
                                        class="mt-2 text-md font-medium text-gray-900 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-500 flex items-left justify-left"
                                        style="font-family: 'Anek Telugu', sans-serif; font-weight: 600">Twitter</a>
                                    <div id="tooltip-twitter" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                        data-popper-placement="top"
                                        style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                                        Find Patience Manirabona On Twitter
                                        <div class="tooltip-arrow" data-popper-arrow=""
                                            style="position: absolute; left: 0px; transform: translate(99px, 0px);">
                                        </div>
                                    </div>
                                </li>
                                <li class="lg:px-2 xl:px-3 lg:mb-0 mt-2">
                                    <a target="_blank" href="https://www.linkedin.com/in/manirabona-patience-3b08051b4/"
                                        data-tooltip-target="tooltip-linkedin"
                                        class="mt-2 text-md font-medium text-gray-900 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-500"
                                        style="font-family: 'Anek Telugu', sans-serif; font-weight: 700">LinkedIn</a>
                                    <div id="tooltip-linkedin" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                        data-popper-placement="top"
                                        style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                                        Find Patience Manirabona On LinkedIn
                                        <div class="tooltip-arrow" data-popper-arrow=""
                                            style="position: absolute; left: 0px; transform: translate(99px, 0px);">
                                        </div>
                                    </div>
                                </li>
                                <li class="lg:px-2 xl:px-3 lg:mb-0 mt-2">
                                    <a target="_blank" href="https://www.instagram.com/manirabona_walker/"
                                        data-tooltip-target="tooltip-insta"
                                        class="mt-2 text-md font-medium text-gray-900 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-500"
                                        style="font-family: 'Anek Telugu', sans-serif; font-weight: 700">Instagram</a>
                                    <div id="tooltip-insta" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                        data-popper-placement="top"
                                        style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                                        Find Patience Manirabona On Instagram
                                        <div class="tooltip-arrow" data-popper-arrow=""
                                            style="position: absolute; left: 0px; transform: translate(99px, 0px);">
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            @if (Auth::check())
                                <a href="{{ route('logout') }}" data-tooltip-target="tooltip-logout"
                                    class=" mb-4 text-gray-500 dark:text-gray-400 bg-red-200 dark:bg-red-700 dark:hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2 mr-1"
                                    style="font-size: 24px">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg> Logout
                                </a>
                                <div id="tooltip-logout" role="tooltip"
                                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-black bg-red-200 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                    data-popper-placement="top"
                                    style="font-size: 17px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                                    Logout your account
                                    <div class="tooltip-arrow" data-popper-arrow=""
                                        style="position: absolute; left: 0px; transform: translate(99px, 0px);"></div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" data-tooltip-target="tooltip-login"
                                    class=" mb-4 text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2 mr-1">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg> Login
                                </a>
                                <div id="tooltip-login" role="tooltip"
                                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                    data-popper-placement="top"
                                    style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                                    Login to your account
                                    <div class="tooltip-arrow" data-popper-arrow=""
                                        style="position: absolute; left: 0px; transform: translate(99px, 0px);"></div>
                                </div>
                            @endif

                            <a href="{{ route('published') }}"
                                data-tooltip-target="tooltip-github-3"
                                class=" mb-4 text-gray-500 dark:text-gray-400 dark:bg-gray-700 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-700 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1">
                                <svg class="svg-icon w-10 h-10" aria-hidden="true" focusable="false"
                                    data-prefix="fab" data-icon="github" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                    <path fill="currentColor"
                                        d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
                                    </path>
                                </svg>
                            </a>
                            <div id="tooltip-github-3" role="tooltip"
                                class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                data-popper-placement="top"
                                style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1179px, -62px);">
                                Published collections
                                <div class="tooltip-arrow" data-popper-arrow=""
                                    style="position: absolute; left: 0px; transform: translate(60px, 0px);"></div>
                            </div>
                            <button id="theme-toggle" onclick="toggleDarkMode()" data-tooltip-target="tooltip-toggle"
                                type="button"
                                class="flex text-gray-500 dark:bg-gray-700 dark:text-gray-400 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                                <svg id="theme-toggle-dark-icon" class="w-10 h-10 hidden" style="font-size: 20px"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                                </svg>
                                <svg id="theme-toggle-light-icon" class="w-10 h-10 hidden" style="font-size: 20px"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                </svg>
                            </button>
                            <div id="tooltip-toggle" role="tooltip"
                                class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                                data-popper-placement="top"
                                style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1262px, -62px);">
                                Toggle dark mode
                                <div class="tooltip-arrow" data-popper-arrow=""
                                    style="position: absolute; left: 0px; transform: translate(69px, 0px);"></div>
                            </div>

                            @if (Auth::check())
                                <a href="{{ route('dashboard') }}" class="ml-3">
                                    <div id="tooltip-jese" role="tooltip" style="font-size: 15px;"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        {{ user()->name }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <img data-tooltip-target="tooltip-jese"
                                        class="ring-2 ring-gray-300 dark:ring-gray-500 w-16 h-16 rounded"
                                        src="{{ user()->avatar }}" alt="{{ user()->name }}">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Large screen Nav-bar --}}
                <div class="flex justify-between items-center">
                    <a href="/" class="flex" data-tooltip-target="tooltip-logo-1">
                        <div class="cursor-pointer w-12">
                            <img src="/img/logos/logo-no-background.svg" alt="patienceman logo">
                        </div>
                        <span class="self-center text-3xl mt-2 font-semibold whitespace-nowrap dark:text-white ml-4"
                            style="font-family: 'Anek Telugu', sans-serif; font-weight: 700;">
                            POSTAPI
                        </span>
                    </a>
                    <div id="tooltip-logo-1" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                        data-popper-placement="top"
                        style="font-size: 15px; position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                        Postapi - Patienceman
                        <div class="tooltip-arrow" data-popper-arrow=""
                            style="position: absolute; left: 0px; transform: translate(99px, 0px);"></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center">
                @if (Auth::check())
                    <a href="{{ route('logout') }}" data-tooltip-target="tooltip-logout"
                        class="hidden sm:inline-block text-gray-500 dark:text-gray-400 bg-red-200 dark:bg-red-700 dark:hover:bg-red-700 focus:outline-none rounded-lg text-sm p-2 mr-1"
                        style="font-size: 16px">
                        <div class="flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span class="ml-2 font-semibold leading-3">Logout</span>
                        </div>
                    </a>
                    <div id="tooltip-logout" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-black bg-red-200 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                        data-popper-placement="top"
                        style="font-size: 17px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                        Logout your account
                        <div class="tooltip-arrow" data-popper-arrow=""
                            style="position: absolute; left: 0px; transform: translate(99px, 0px);"></div>
                    </div>
                @else
                    <a href="{{ route('login') }}" data-tooltip-target="tooltip-login"
                        class="hidden sm:inline-block text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 mr-1">
                        <div class="flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span class="ml-3 font-semibold leading-3">Login</span>
                        </div>
                    </a>
                    <div id="tooltip-login" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                        data-popper-placement="top"
                        style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1186px, -64px);">
                        Login to your account
                        <div class="tooltip-arrow" data-popper-arrow=""
                            style="position: absolute; left: 0px; transform: translate(99px, 0px);"></div>
                    </div>
                @endif

                <a href="{{ route('published') }}"
                    data-tooltip-target="tooltip-github-2"
                    class="hidden sm:inline-block text-gray-500 dark:text-gray-400 dark:bg-gray-700 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5 mr-1">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>
                        <span class="ml-2 font-semibold leading-3">Published</span>
                    </div>
                </a>
                <div id="tooltip-github-2" role="tooltip"
                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                    data-popper-placement="top"
                    style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1179px, -62px);">
                    Published collections
                    <div class="tooltip-arrow" data-popper-arrow=""
                        style="position: absolute; left: 0px; transform: translate(60px, 0px);"></div>
                </div>

                {{-- <button id="theme-toggle" onclick="toggleDarkMode()" data-tooltip-target="tooltip-toggle"
                    type="button"
                    class="flex text-gray-500 dark:bg-gray-700 dark:text-gray-400 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="w-6 h-6 hidden" style="font-size: 20px"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>
                    <svg id="theme-toggle-light-icon" class="w-6 h-6" style="font-size: 20px"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>
                </button>
                <div id="tooltip-toggle" role="tooltip"
                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                    data-popper-placement="top"
                    style="font-size: 15px;position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1262px, -62px);">
                    Toggle dark mode
                    <div class="tooltip-arrow" data-popper-arrow=""
                        style="position: absolute; left: 0px; transform: translate(69px, 0px);"></div>
                </div> --}}

                @if (Auth::check())
                    <a href="{{ route('dashboard') }}" class="ml-3">
                        <div id="tooltip-jese" role="tooltip" style="font-size: 15px;"
                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                            {{ user()->name }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <img data-tooltip-target="tooltip-jese"
                            class="ring-4 ring-gray-50 dark:ring-gray-500 w-10 h-10 rounded-circle ml-2"
                            src="{{ user()->avatar }}" alt="{{ user()->name }}">
                    </a>
                @endif
            </div>
        </div>
    </div>
</header>
