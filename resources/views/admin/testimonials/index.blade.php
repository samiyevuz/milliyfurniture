@extends('admin.layouts.app')

@section('page-title', 'Testimonials')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-900">Testimonials</h1>

    <a href="{{ route('admin.testimonials.create') }}"
       class="bg-[#0A4C8A] text-white px-6 py-2.5 rounded-lg hover:bg-[#083b6b] transition font-medium">
        + Add Testimonial
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Step Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($testimonials as $testimonial)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $testimonial->id }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $testimonial->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                            {{ $testimonial->step_number }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $testimonial->order ?? 0 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($testimonial->status)
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Active</span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                           class="text-[#0A4C8A] hover:text-[#083b6b] hover:underline">
                            Edit
                        </a>

                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <p class="text-sm font-medium">No testimonials yet</p>
                            <p class="text-xs text-gray-400 mt-1">Create your first testimonial to get started</p>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if($testimonials->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
