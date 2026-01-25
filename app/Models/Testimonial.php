<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'step_number',
        'status',
        'order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'step_number' => 'integer',
        'order' => 'integer',
    ];

    /**
     * Scope a query to only include active testimonials.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    /**
     * Scope a query to order by order field.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }
}
