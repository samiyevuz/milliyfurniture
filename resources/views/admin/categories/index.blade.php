@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold">Categories</h1>

        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Category
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow">
        <table class="w-full text-left">
            <thead class="border-b">
                <tr>
                    <th class="p-4">#</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr class="border-b">
                    <td class="p-4">{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->status)
                            <span class="text-green-600">Active</span>
                        @else
                            <span class="text-red-600">Inactive</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-6 text-center text-gray-500">
                        No categories yet
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
