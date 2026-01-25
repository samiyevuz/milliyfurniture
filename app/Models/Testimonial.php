<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'images',
        'step_number',
        'status',
        'order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'step_number' => 'integer',
        'order' => 'integer',
        'images' => 'array',
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
        // Check if 'order' column exists in the table
        $columns = Schema::getColumnListing($this->getTable());
        
        if (in_array('order', $columns)) {
            return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
        }
        
        // Fallback to id if 'order' column doesn't exist
        return $query->orderBy('id', 'asc');
    }
}
