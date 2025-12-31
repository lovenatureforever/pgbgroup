<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SustainabilityOverview extends Model
{
    protected $fillable = [
        'description_1',
        'description_2',
        'image_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
