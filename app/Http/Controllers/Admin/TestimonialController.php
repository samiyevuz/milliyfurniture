<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index(): View
    {
        $testimonials = Testimonial::ordered()
            ->latest()
            ->paginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'sometimes|boolean',
        ]);

        // Get the next step number and order automatically
        $maxStepNumber = Testimonial::max('step_number') ?? 0;
        $maxOrder = Testimonial::max('order') ?? 0;

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'step_number' => $maxStepNumber + 1,
            'status' => $request->boolean('status', true),
            'order' => $maxOrder + 1,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        // Handle multiple images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $images[] = $file->store('testimonials', 'public');
            }
            $data['images'] = $images;
        }

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Sharh muvaffaqiyatli yaratildi');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'existing_images' => 'nullable|array',
            'removed_images' => 'nullable|array',
            'step_number' => 'required|integer|min:1|max:10',
            'status' => 'sometimes|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'step_number' => $validated['step_number'],
            'status' => $request->boolean('status', $testimonial->status),
            'order' => $validated['order'] ?? $testimonial->order ?? 0,
        ];

        if ($request->hasFile('image')) {
            // Eski rasmni o'chirish
            if ($testimonial->image) {
                \Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        // Handle existing images
        $existingImages = $testimonial->images ?? [];
        if ($request->has('existing_images')) {
            $existingImages = $request->input('existing_images', []);
        }

        // Remove deleted images
        if ($request->has('removed_images')) {
            foreach ($request->input('removed_images', []) as $removedImage) {
                \Storage::disk('public')->delete($removedImage);
                $existingImages = array_values(array_filter($existingImages, function($img) use ($removedImage) {
                    return $img !== $removedImage;
                }));
            }
        }

        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $existingImages[] = $file->store('testimonials', 'public');
            }
        }

        $data['images'] = $existingImages;

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Sharh muvaffaqiyatli yangilandi');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        // Rasmni o'chirish
        if ($testimonial->image) {
            \Storage::disk('public')->delete($testimonial->image);
        }

        // Delete multiple images if exist
        if ($testimonial->images && is_array($testimonial->images)) {
            foreach ($testimonial->images as $image) {
                \Storage::disk('public')->delete($image);
            }
        }

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Sharh muvaffaqiyatli o\'chirildi');
    }
}
