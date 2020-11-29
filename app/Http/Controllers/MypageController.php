<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;

class MypageController extends Controller
{
  public function show($id){
    $user = User::find($id);
    $posts = Post::orderBy('updated_at','desc')
    ->where('user_id', $id)
    ->paginate(5);

    return view('userpage', compact('user','posts'));
  }

  public function edit($id)
  {
      $user = User::find($id);
      return view('profile-edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if($request->file('icon')){
      $image = $request->file('icon')->store('public/image');
      $image = str_replace('public/image/', '', $image);
      $user->icon = $image;
    }
    $user->comment = $request->input('comment');
    $user->save();
    return redirect('/userpage/'.$id);
  }
}
