<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'category',
        'title',
        'description',
        'button_text',
        'button_url',
        'position',
        'text_color',
        'text_style',
        'button_type',
        'text_align',
        'effect',
        'text_effect',
        'is_published'
    ];
    protected $casts = [
        'is_published' => 'boolean',
    ];
}
