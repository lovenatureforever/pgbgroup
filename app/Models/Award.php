<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'receive_date'
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'viewable');
    }
}
