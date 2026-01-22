@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Categories</h1>
    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add Category
    </a>
</div>

<div class="bg-white rounded shadow">
    <table class="w-full text-left">
        <thead class="border-b">
            <tr>
                <th class="p-4">#</th>
                <th>Name</th>
                <th>Status</th>
                <th class="text-right p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr class="border-b">
                <td class="p-4">{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if($category->status)
                        <span class="text-green-600">Active</span>
                    @else
                        <span class="text-red-600">Inactive</span>
                    @endif
                </td>
                <td class="p-4 text-right space-x-3">
                    <a href="{{ route('admin.categories.edit', $category) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                            onclick="return confirm('Delete this category?')"
                            class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-6 text-center text-gray-500">
                    No categories yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
