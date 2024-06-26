<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    //one image belongs to one post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
