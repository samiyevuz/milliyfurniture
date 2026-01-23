@extends('admin.layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Products</h1>

    <a href="{{ route('admin.products.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        + Add Product
    </a>
</div>

<div class="bg-white rounded shadow overflow-x-auto">
    <table class="w-full text-left">
        <thead class="border-b bg-gray-50">
            <tr>
                <th class="p-4">#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                <th class="p-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($products as $product)
            <tr class="border-b">
                <td class="p-4">{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>{{ $product->price ?? '-' }}</td>

                <td>
                    @if($product->status)
                        <span class="text-green-600 font-medium">Active</span>
                    @else
                        <span class="text-red-600 font-medium">Inactive</span>
                    @endif
                </td>

                <td class="p-4 text-right space-x-3">
                    <a href="{{ route('admin.products.edit', $product) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('admin.products.destroy', $product) }}"
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('Delete this product?')">
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
                <td colspan="6" class="p-6 text-center text-gray-500">
                    No products yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
