<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

class Project extends Model


{
    protected $fillable = [
        'title', 'description', 'information', 'slug', 'is_published', 'category', 'status', 'type', 'office'
    ];
    public function registerInterests()
    {
        return $this->hasMany(\App\Models\RegisterInterest::class);
    }
    /**
     * Get all the project's images.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'viewable');
    }

    protected static function booted()
    {
        static::deleting(function ($project) {
            $project->images()->delete(); // deletes related images from DB
            // Optionally: delete image files from storage
            foreach ($project->images as $image) {
                Storage::delete('upload/' . $image->url);
            }
        });
    }
}
