<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart City Platform</title>

    <!-- CSS -->
    <link rel="shortcut icon" href="{{ asset('assets/img/Logo/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- END CSS -->

    <!-- JS -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>

    <!-- HEADER -->
    @include('components.header')
    <!-- END HEADER -->

    <!-- MAIN -->
    <main class="main-content">
        @yield('content')
    </main>
    <!-- END MAIN -->

    <!-- FOOTER -->
    @include('components.footer')
    <!-- END FOOTER -->

    @livewireScripts
</body>

</html>
