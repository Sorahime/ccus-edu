
<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#f4fbf8">

    <meta name="description"
        content="CCUS Edu - Explore, Learn, Discover. Platform edukasi Carbon Capture, Utilization, and Storage.">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'CCUS Edu — Explore, Learn, Discover')
    </title>

    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- VITE --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body>

    {{-- GLOBAL NAVBAR --}}
    @include('partials.navbar')


    {{-- PAGE CONTENT --}}
    @yield('content')


</body>

</html>
