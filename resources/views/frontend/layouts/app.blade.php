<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Milliy Furniture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

<div class="min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r px-4 py-6">
        <h2 class="text-xl font-bold mb-6">Admin Panel</h2>

        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-3 py-2 rounded hover:bg-gray-100">
                Dashboard
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="block px-3 py-2 rounded hover:bg-gray-100">
                Categories
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="block px-3 py-2 rounded hover:bg-gray-100">
                Products
            </a>

            <a href="#"
               class="block px-3 py-2 rounded hover:bg-gray-100">
                Gallery
            </a>

            <a href="#"
               class="block px-3 py-2 rounded hover:bg-gray-100">
                Settings
            </a>
        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
