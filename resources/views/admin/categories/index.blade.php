<!-- @extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-semibold">Categories</h1>
        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Category
        </a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="border-b">
                <th class="p-3 text-left">#</th>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr class="border-b">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $category->name }}</td>
                    <td class="p-3">
                        {{ $category->status ? 'Active' : 'Inactive' }}
                    </td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="text-blue-600">Edit</a>
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
@endsection -->


@extends('admin.layouts.app')

@section('content')
    <h1>Categories works ✅</h1>
@endsection
