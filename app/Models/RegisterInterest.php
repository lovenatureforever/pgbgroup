<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterInterest extends Model


{
    use HasFactory;

    protected $fillable = [
        'phone',
        'project_id',
        'name',
        'email',
    ];
        public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }
}
