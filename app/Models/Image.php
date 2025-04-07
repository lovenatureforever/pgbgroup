<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $fillable = [
        'viewable_type',
        'viewable_id',
        'url',
        'alt',
        'position'
    ];

    /**
     * Get the parent viewable model.
     */
    public function viewable(): MorphTo
    {
        return $this->morphTo();
    }
}
