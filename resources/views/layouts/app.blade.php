<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart City Platform</title>

    <!-- CSS -->
    <link rel="shortcut icon" href="{{ asset('assets/img/Logo/icon.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <!-- END CSS -->

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

    @livewireStyles

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <!-- Desktop sidebar -->
        {{-- @include('layouts.sidebar') --}}
        <!-- Mobile sidebar -->

        <!-- Backdrop (Mobile Sidebar) -->
        {{-- @include('layouts.sidebarresponsive') --}}

        <div class="flex flex-col flex-1 w-full">

            @include('layouts.header')

            <main class="h-full overflow-y-auto">

                @yield('content')

            </main>

        </div>

    </div>

    @livewireScripts

</body>

</html>
