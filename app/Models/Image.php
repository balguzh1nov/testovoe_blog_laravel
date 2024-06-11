<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
    ];

    // Определение обратной связи с моделью Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
