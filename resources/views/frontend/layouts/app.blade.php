<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Milliy Furniture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    {{-- Tailwind / Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    
</head>
<body class="bg-[#F5F7FB] text-gray-800">

    @include('frontend.partials.header')

    <main>
        @yield('content')
    </main>

</body>
</html>
