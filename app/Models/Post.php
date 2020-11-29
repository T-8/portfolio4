<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  public function user(){
      return $this->belongsTo(User::class);
  }

  public function comments(){
      return $this->hasMany(Comment::class);
  }
}
