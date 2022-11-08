<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //one comment only belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //oone comment belongs to one post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function editCommentPermission()
    {
        return $this->hasMany(EditCommentPermission::class);
    }
}
