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
    <table class="w-full text-left border-collapse">
        <thead class="border-b bg-gray-50">
            <tr>
                <th class="p-4">#</th>
                <th class="p-4">Name</th>
                <th class="p-4">Category</th>
                <th class="p-4">Price</th>
                <th class="p-4">Status</th>
                <th class="p-4 text-right">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($products as $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4">{{ $product->id }}</td>

                <td class="p-4">
                    {{ $product->name }}
                </td>

                <td class="p-4">
                    {{ $product->category->name ?? '-' }}
                </td>

                <td class="p-4">
                    {{ number_format($product->price, 0, '.', ' ') }}
                </td>

                <td class="p-4">
                    @if($product->status)
                        <span class="text-green-600 font-medium">Active</span>
                    @else
                        <span class="text-red-600 font-medium">Inactive</span>
                    @endif
                </td>

                <td class="p-4 text-right space-x-3">
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="text-blue-600 hover:underline">
                        Edit
                    </a>

                    <form action="{{ route('admin.products.destroy', $product->id) }}"
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
