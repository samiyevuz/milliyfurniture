<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Milliy Furniture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- FRONTEND HEADER --}}
    @include('frontend.partials.header')

    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
