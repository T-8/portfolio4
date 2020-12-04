<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::orderBy('updated_at','desc')
        ->where('title','like','%'.$search.'%')
        ->where('text','like','%'.$search.'%')
        ->paginate(10);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $post = new Post;
      $post->title = $request->input('title');
      $post->text = $request->input('text');

      if($request->file('post_img')){
        $image = $request->file('post_img')->store('public/image');
        $image = str_replace('public/image/', '', $image);
        $post->post_img = $image;
      }

      $post->user_id = $request->user()->id;
      $post->save();
      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::orderBy('updated_at','desc')
        ->where('post_id', $id)
        ->paginate(15);
        return view('post.show', compact('post','comments'));
    }

    public function no_auth_show($id)
    {
        $post = Post::find($id);
        $comments = Comment::orderBy('updated_at','desc')
        ->where('post_id', $id)
        ->paginate(15);
        return view('post.no_auth_show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->text = $request->input('text');

      if($request->file('post_img')){
        $image = $request->file('post_img')->store('public/image');
        $image = str_replace('public/image/', '', $image);
        $post->post_img = $image;
      }

      $post->save();
      return redirect('/show/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $comments = Comment::where('post_id', $id)->get();
      $post->delete();
      foreach ($comments as $comment){
        $comment->delete();
      }

      return redirect('/');
    }
}
