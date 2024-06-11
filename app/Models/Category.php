<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    // Определение обратной связи с моделью Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
