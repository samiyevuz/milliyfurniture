@extends('admin.layouts.app')

@section('page-title', 'Sharhni tahrirlash')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Sharhni tahrirlash</h1>

    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Sarlavha <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $testimonial->title) }}"
                       class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                       required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Tavsif <span class="text-red-500">*</span>
                </label>
                <textarea id="description"
                          name="description"
                          rows="4"
                          class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                          required>{{ old('description', $testimonial->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    Rasm
                </label>
                @if($testimonial->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->title }}" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                    </div>
                @endif
                <input type="file"
                       id="image"
                       name="image"
                       accept="image/*"
                       class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="step_number" class="block text-sm font-medium text-gray-700 mb-2">
                        Qadam raqami <span class="text-red-500">*</span>
                    </label>
                    <input type="number"
                           id="step_number"
                           name="step_number"
                           value="{{ old('step_number', $testimonial->step_number) }}"
                           min="1"
                           max="10"
                           class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition"
                           required>
                    @error('step_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                        Tartib
                    </label>
                    <input type="number"
                           id="order"
                           name="order"
                           value="{{ old('order', $testimonial->order ?? 0) }}"
                           min="0"
                           class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition">
                    @error('order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox"
                       id="status"
                       name="status"
                       value="1"
                       {{ old('status', $testimonial->status) ? 'checked' : '' }}
                       class="w-4 h-4 text-[#0A4C8A] border-gray-300 rounded focus:ring-[#0A4C8A] focus:ring-2">
                <label for="status" class="ml-2 text-sm font-medium text-gray-700">
                    Faol
                </label>
            </div>
        </div>

        <div class="mt-8 flex items-center space-x-4">
            <button type="submit"
                    class="bg-[#0A4C8A] text-white px-6 py-2.5 rounded-lg hover:bg-[#083b6b] transition font-medium">
                Yangilash
            </button>

            <a href="{{ route('admin.testimonials.index') }}"
               class="text-gray-600 hover:text-gray-900 font-medium">
                Bekor qilish
            </a>
        </div>
    </form>
</div>
@endsection
