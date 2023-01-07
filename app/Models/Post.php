<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //one popst has only one orginal author
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //one post can has zero to many images
    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

    //one post can has zero to many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function editPostPermission()
    {
        return $this->hasMany(EditPostPermission::class);
    }
}
