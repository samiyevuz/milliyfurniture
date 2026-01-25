@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Kategoriyani tahrirlash</h1>

<form action="{{ route('admin.categories.update', $category) }}" method="POST" class="max-w-md">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-2">Kategoriya nomi</label>
        <input type="text"
               name="name"
               value="{{ old('name', $category->name) }}"
               class="w-full border rounded px-3 py-2"
               required>
    </div>

    <div class="flex items-center gap-2">
    <input type="checkbox"
           name="status"
           value="1"
           {{ $category->status ? 'checked' : '' }}>
    <label>Faol</label>
</div>


    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Yangilash
    </button>

    <a href="{{ route('admin.categories.index') }}"
       class="ml-3 text-gray-600">
        Bekor qilish
    </a>
</form>
@endsection
