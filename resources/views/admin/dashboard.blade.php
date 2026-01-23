@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Categories</p>
        <p class="text-2xl font-bold mt-2">{{ $categoriesCount }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Products</p>
        <p class="text-2xl font-bold mt-2">{{ $productsCount }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-gray-500">Gallery Items</p>
        <p class="text-2xl font-bold mt-2">{{ $galleryCount }}</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <h2 class="text-lg font-semibold p-6 border-b">Latest Products</h2>

    <table class="w-full text-left">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-4">#</th>
                <th class="p-4">Name</th>
                <th class="p-4">Category</th>
                <th class="p-4">Price</th>
            </tr>
        </thead>
        <tbody>
        @forelse($latestProducts as $product)
            <tr class="border-b">
                <td class="p-4">{{ $product->id }}</td>
                <td class="p-4">{{ $product->name }}</td>
                <td class="p-4">{{ $product->category->name ?? '-' }}</td>
                <td class="p-4">{{ number_format($product->price, 0, '.', ' ') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-6 text-center text-gray-500">
                    No products yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
