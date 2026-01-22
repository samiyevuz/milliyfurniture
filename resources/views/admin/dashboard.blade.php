@extends('admin.layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Categories</p>
            <p class="text-2xl font-bold mt-2">0</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Products</p>
            <p class="text-2xl font-bold mt-2">0</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500">Gallery Items</p>
            <p class="text-2xl font-bold mt-2">0</p>
        </div>
    </div>
@endsection
