<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content'
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id', 'id');
    }
}
