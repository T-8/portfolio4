<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\User;

class CommentController extends Controller
{

  public function create($id)
  {
      $post = Post::find($id);
      return view('comment.create', compact('post'));
  }

  public function store(Request $request, $id)
  {
    $comment = new Comment;
    $comment->comment = $request->input('comment');

    if($request->file('comment_img')){
      $image = $request->file('comment_img')->store('public/image');
      $image = str_replace('public/image/', '', $image);
      $comment->comment_img = $image;
    }

    $comment->post_id = $id;
    $comment->user_id = $request->user()->id;
    $comment->save();
    return redirect('/show/'.$id);
  }

  public function destroy($id)
  {
    $comment = Comment::find($id);
    $comment->delete();

    return redirect('/show/'.$comment->post_id);
  }
}
