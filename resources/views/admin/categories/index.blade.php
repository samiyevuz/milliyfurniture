@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Kategoriyalar</h1>

    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        + Kategoriya qo'shish
    </a>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead class="border-b bg-gray-50">
            <tr>
                <th class="p-4">#</th>
                <th class="p-4">Nomi</th>
                <th class="p-4">Holati</th>
                <th class="p-4">Mahsulotlar soni</th>
                <th class="p-4 text-right">Amallar</th>
            </tr>
        </thead>

        <tbody>
        @forelse($categories as $category)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4">{{ $category->id }}</td>
                <td class="p-4">{{ $category->name }}</td>

                <td class="p-4">
                    @if($category->status)
                        <span class="text-green-600 font-medium">Faol</span>
                    @else
                        <span class="text-red-600 font-medium">Nofaol</span>
                    @endif
                </td>

                <td class="p-4">
                    {{ $category->products_count ?? 0 }}
                </td>

                <td class="p-4 text-right space-x-3">
                    <a href="{{ route('admin.categories.edit', $category) }}"
                       class="text-blue-600 hover:underline">
                        Tahrirlash
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category) }}"
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('Bu kategoriyani o\'chirishni xohlaysizmi?')">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-600 hover:underline">
                            O'chirish
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="p-6 text-center text-gray-500">
                    Hozircha kategoriya yo'q
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
