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
                    Asosiy rasm
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

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Qo'shimcha rasmlar
                </label>
                
                @if($testimonial->images && count($testimonial->images) > 0)
                    <div class="mb-4 grid grid-cols-4 gap-3">
                        @foreach($testimonial->images as $img)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $img) }}" alt="Testimonial image" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                                <button type="button" onclick="removeExistingImage('{{ $img }}')" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition text-xs">
                                    ×
                                </button>
                                <input type="hidden" name="existing_images[]" value="{{ $img }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                <div id="images-container" class="space-y-3">
                    <div class="image-input-wrapper flex items-center gap-3">
                        <input type="file"
                               name="images[]"
                               accept="image/*"
                               class="flex-1 px-4 py-2.5 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#0A4C8A] focus:border-[#0A4C8A] outline-none transition">
                        <button type="button" onclick="removeImageInput(this)" class="px-4 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition hidden remove-btn">
                            O'chirish
                        </button>
                    </div>
                </div>
                <button type="button" onclick="addImageInput()" class="mt-3 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-sm font-medium">
                    + Rasm qo'shish
                </button>
                @error('images.*')
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
