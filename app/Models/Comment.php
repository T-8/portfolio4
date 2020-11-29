<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Comment;
use App\User;

class Comment extends Model
{
    public function post(){
      return $this->belongsTo(Post::class);
    }

   public function user(){
      return $this->belongsTo(User::class);
    }
}
