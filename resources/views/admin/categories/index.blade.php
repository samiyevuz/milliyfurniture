@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Categories</h1>

    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add Category
    </a>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead class="border-b bg-gray-50">
            <tr>
                <th class="p-4">#</th>
                <th class="p-4">Name</th>
                <th class="p-4">Status</th>
                <th class="p-4">Products count</th>
                <th class="p-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($categories as $category)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4">{{ $category->id }}</td>
                <td class="p-4">{{ $category->name }}</td>

                <td class="p-4">
                    @if($category->status)
                        <span class="text-green-600 font-medium">Active</span>
                    @else
                        <span class="text-red-600 font-medium">Inactive</span>
                    @endif
                </td>

                <td class="p-4">
                    {{ $category->products_count ?? 0 }}
                </td>

                <td class="p-4 text-right space-x-3">
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('Delete this category?')">
                        @csrf
                        @method('DELETE')

                        <button class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="p-6 text-center text-gray-500">
                    No categories yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
