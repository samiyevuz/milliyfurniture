@extends('admin.layouts.app')

@section('page-title', 'Mahsulot qo\'shish')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Mahsulot qo'shish</h1>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        @csrf

        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Mahsulot nomi <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Kategoriya <span class="text-red-500">*</span>
                </label>
                <select id="category_id"
                        name="category_id"
                        class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                        required>
                    <option value="">Kategoriyani tanlang</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Tavsif
                </label>
                <textarea id="description"
                          name="description"
                          rows="4"
                          class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                    Narxi (UZS) <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       id="price"
                       name="price"
                       value="{{ old('price') }}"
                       min="0"
                       step="0.01"
                       class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                       required>
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    Rasm
                </label>
                <input type="file"
                       id="image"
                       name="image"
                       accept="image/*"
                       class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox"
                       id="status"
                       name="status"
                       value="1"
                       {{ old('status', true) ? 'checked' : '' }}
                       class="w-4 h-4 text-[#0A4C8A] border-gray-300 rounded focus:ring-[#0A4C8A] focus:ring-2">
                <label for="status" class="ml-2 text-sm font-medium text-gray-700">
                    Faol
                </label>
            </div>
        </div>

        <div class="mt-8 flex items-center space-x-4">
            <button type="submit"
                    class="bg-[#0A4C8A] text-white px-6 py-2.5 rounded-lg hover:bg-[#083b6b] transition font-medium">
                Saqlash
            </button>

            <a href="{{ route('admin.products.index') }}"
               class="text-gray-600 hover:text-gray-900 font-medium">
                Bekor qilish
            </a>
        </div>
    </form>
</div>
@endsection
