<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['news_date', 'title', 'content', 'url'];
    public function images()
    {
        return $this->morphMany(Image::class, 'viewable');
    }
}
