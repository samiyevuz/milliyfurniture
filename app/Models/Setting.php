<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'address',
        'telegram',
        'instagram',
        'work_days',
    ];

    protected $casts = [
        'work_days' => 'array',
    ];

    /**
     * Get or create the first setting record.
     */
    public static function getSetting(): self
    {
        return static::firstOrCreate([], [
            'phone' => '',
            'email' => '',
            'address' => '',
            'telegram' => '',
            'instagram' => '',
            'work_days' => [
                'mon' => ['from' => null, 'to' => null],
                'tue' => ['from' => null, 'to' => null],
                'wed' => ['from' => null, 'to' => null],
                'thu' => ['from' => null, 'to' => null],
                'fri' => ['from' => null, 'to' => null],
                'sat' => ['from' => null, 'to' => null],
                'sun' => ['from' => null, 'to' => null],
            ],
        ]);
    }
}
