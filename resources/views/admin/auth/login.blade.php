<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kirish - Milliy Mebel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-[#0A2540] via-[#0A4C8A] to-[#083b6b] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        {{-- Login Card --}}
        <div class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
            {{-- Logo/Header --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-[#0A2540] mb-2">Milliy Mebel</h1>
                <p class="text-gray-500 text-sm">Admin Panel</p>
            </div>

            <h2 class="text-2xl font-bold text-[#0A2540] mb-8 text-center">Kirish</h2>

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                    <ul class="text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Success Messages --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
                @csrf

                {{-- Email Field --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Elektron pochta
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', 'admin@example.com') }}"
                        required
                        autofocus
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition-all duration-200 bg-white text-gray-900 placeholder-gray-400"
                        placeholder="johndoe@gmail.com"
                    >
                </div>

                {{-- Password Field --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Parol
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition-all duration-200 bg-white text-gray-900 placeholder-gray-400"
                        placeholder="admin123"
                    >
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="w-4 h-4 text-[#0A4C8A] border-gray-300 rounded focus:ring-[#0A4C8A] focus:ring-2"
                        >
                        <label for="remember" class="ml-2 text-sm text-gray-600">
                            Meni eslab qol
                        </label>
                    </div>
                </div>

                {{-- Submit Button --}}
                <button
                    type="submit"
                    class="w-full bg-[#0A4C8A] text-white py-3.5 rounded-xl font-semibold hover:bg-[#083b6b] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                >
                    Kirish
                </button>
            </form>

            {{-- Footer --}}
            <p class="text-center text-xs text-gray-500 mt-8">
                &copy; {{ date('Y') }} Milliy Mebel. Barcha huquqlar himoyalangan.
            </p>
        </div>
    </div>
</body>
</html>
