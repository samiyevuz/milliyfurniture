<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F7FB] text-gray-800">

<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="hidden md:flex w-64 bg-white shadow-md flex-col">
        <div class="px-6 py-5 text-xl font-bold text-[#0A4C8A]">
            Admin Panel
        </div>

        <nav class="flex-1 px-4 space-y-2 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-[#F5F7FB]">
                Dashboard
            </a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 rounded-lg hover:bg-[#F5F7FB]">
                Categories
            </a>
            <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 rounded-lg hover:bg-[#F5F7FB]">
                Products
            </a>
            <a href="{{ route('admin.testimonials.index') }}"
   class="block px-3 py-2 rounded hover:bg-gray-100">
    Testimonials
</a>


            <a href="#" class="block px-4 py-2 rounded-lg hover:bg-[#F5F7FB]">
                Settings
            </a>
        </nav>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col">

        {{-- TOPBAR --}}
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6">
            <button class="md:hidden text-xl">
                ☰
            </button>

            <div class="text-sm">
                Admin
            </div>
        </header>

        {{-- CONTENT --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
