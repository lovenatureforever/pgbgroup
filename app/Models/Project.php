<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'slug', 'is_published', 'category', 'status'
    ];

    /**
     * Get all the project's images.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'viewable');
    }
}
