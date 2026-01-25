@extends('admin.layouts.app')

@section('page-title', 'Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-900">Products</h1>

    <a href="{{ route('admin.products.create') }}"
       class="bg-[#0A4C8A] text-white px-6 py-2.5 rounded-lg hover:bg-[#083b6b] transition font-medium">
        + Add Product
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($products as $product)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->id }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                            {{ $product->category->name ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                        {{ number_format($product->price, 0, '.', ' ') }} UZS
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($product->status)
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="text-[#0A4C8A] hover:text-[#083b6b] hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('admin.products.destroy', $product) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-600 hover:text-red-800 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="text-sm font-medium">No products yet</p>
                            <p class="text-xs text-gray-400 mt-1">Create your first product to get started</p>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
