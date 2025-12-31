<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
class CommunityImpact extends Model
{
    protected $fillable = ['date', 'title', 'content'];
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'viewable');
    }
}
