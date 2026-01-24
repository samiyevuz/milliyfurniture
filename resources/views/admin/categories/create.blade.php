@extends('admin.layouts.app')

@section('content')
<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-semibold mb-6">Add Category</h1>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">Category Name</label>
            <input type="text" name="name"
                   class="w-full border rounded px-4 py-2"
                   required>
        </div>
        <div class="flex items-center gap-2">
    <input type="checkbox" name="status" value="1" checked>
    <label>Active</label>
</div>


        <button class="bg-blue-600 text-white px-6 py-2 rounded">
            Save
        </button>
    </form>
</div>
@endsection
