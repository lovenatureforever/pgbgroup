<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceHighlight extends Model
{
    protected $fillable = [
        'url',
        'title',
        'subtitle',
        'description',
        'image_url',
        'pillar',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByPillar($query, $pillar)
    {
        return $query->where('pillar', $pillar);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
