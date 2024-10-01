<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
</div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <img class="w-24 h-24 rounded-full mx-auto py-4" src="{{ asset('assets/img/Logo/logo.png') }}" alt="" width="50"
            height="50">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            smart City Platform
        </a>

        <div class="px-6 my-6">
            <button
                class="flex w-full items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Navigasi
            </button>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{ route('dashboard') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="togglePagesMenuEnvResponsive" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M21 12.79A9 9 0 1 1 12.21 3h0a9 9 0 1 1 8.79 9.79z"></path>
                            <path
                                d="M2.59 12.34a9.02 9.02 0 0 1 3.61-5.22c.4-.28.72-.56.97-.83.75-.83.87-1.53 2.58-1.42h.25c.96.06 1.82.34 2.58.83 1.58.97 1.83 2.22 1.61 3.22-.12.49-.4.93-.83 1.39-.83.83-1.9 1.67-3.06 1.5-.92-.11-1.5-.28-1.97.25-.28.34-.39.78-.25 1.25.28.97 1.25 1.61 2.08 2.28.9.72 1.86 1.55 1.92 3 .06 1.53-.66 2.64-1.25 3.28h0a9 9 0 0 1-8.58-7.95z">
                            </path>
                        </svg>
                        <span class="ml-4">Environment</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpenEnvResponsive">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">Kualitas Udara</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Ketinggian Air
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Kualitas Air
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="#">
                    <svg class="w-5 h-5" fill="none" stroke="#B0B0B0" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M3 10h3M3 6h18M9 14h3M13 18h3M17 10h4M10 6h10M3 18h7"></path>
                        <path d="M12 6v6M6 18v-4M18 14v4"></path>
                    </svg>
                    <span class="ml-4">Region Income</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="togglePagesMenuHealthRes" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M10 14v4a1 1 0 001 1h2a1 1 0 001-1v-4h4a1 1 0 001-1v-2a1 1 0 00-1-1h-4V6a1 1 0 00-1-1h-2a1 1 0 00-1 1v4H6a1 1 0 00-1 1v2a1 1 0 001 1h4z">
                            </path>
                        </svg>
                        <span class="ml-4">Health</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpenHealthRes">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Summary
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Persalinan & Kehamilan
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="#">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 14l9-5-9-5-9 5 9 5zm0 0v6a9 9 0 100-18v6a9 9 0 100 18z"></path>
                    </svg>
                    <span class="ml-4">Education</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="togglePagesMenuReportRes" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12l2 2 4-4M7 2h10a2 2 0 012 2v16a2 2 0 01-2 2H7a2 2 0 01-2-2V4a2 2 0 012-2z">
                            </path>
                        </svg>
                        <span class="ml-4">Reporting</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpenReportRes">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Summary
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Tabel List
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="modals.html">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14V10zM3 7h9a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2V9a2 2 0 012-2z">
                        </path>
                        <path d="M9 15v-2a1 1 0 011-1h3a1 1 0 011 1v2m-6 2h6"></path>
                    </svg>
                    <span class="ml-4">Vidio Analyctic</span>
                </a>
            </li>
        </ul>

        <div class="px-6 my-6">
            <button
                class="flex w-full items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Admin Modules
            </button>
        </div>
        <ul>
            <li class="relative px-6 py-3">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="togglePagesMenuPengaturanRes" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z"></path>
                            <path
                                d="M12 1.75a.75.75 0 011.5 0v1.042a7.5 7.5 0 012.086.616l.737-.737a.75.75 0 111.061 1.06l-.737.738a7.51 7.51 0 011.39 1.391l.737-.738a.75.75 0 111.061 1.06l-.738.737a7.496 7.496 0 01.615 2.087h1.042a.75.75 0 010 1.5h-1.042a7.496 7.496 0 01-.615 2.087l.738.737a.75.75 0 01-1.06 1.061l-.738-.737a7.51 7.51 0 01-1.391 1.39l.738.737a.75.75 0 01-1.061 1.061l-.737-.737a7.499 7.499 0 01-2.087.615v1.042a.75.75 0 01-1.5 0v-1.042a7.496 7.496 0 01-2.087-.615l-.737.737a.75.75 0 11-1.061-1.06l.737-.738a7.51 7.51 0 01-1.39-1.391l-.738.738a.75.75 0 01-1.061-1.06l.738-.737a7.496 7.496 0 01-.616-2.087H1.75a.75.75 0 010-1.5h1.042a7.496 7.496 0 01.616-2.087l-.738-.737a.75.75 0 011.06-1.061l.738.738a7.51 7.51 0 011.391-1.39l-.738-.738a.75.75 0 011.061-1.06l.737.737a7.5 7.5 0 012.087-.616V1.75z">
                            </path>
                        </svg>
                        <span class="ml-4">Pengaturan</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpenPengaturanRes">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">CCTV</a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Data User
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                Module Manajemen
                            </a>
                        </li>
                        <li
                            class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">
                                User Group
                            </a>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</aside>
