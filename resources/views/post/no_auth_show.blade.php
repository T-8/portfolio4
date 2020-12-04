@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                  <div class="text" style="white-space:pre-wrap;">{{$post->text}}</div>
                  @if(isset($post->post_img))
                  <div class="post_img text-center">
                      <img src="{{asset('storage/image/'.$post->post_img)}}" alt="{{ $post->post_img }}" style="width:350px;height:250px;">
                  </div>
                  @endif
                  <div class="float-left mt-3">
                    {{ $post->updated_at }}
                  </div>

                  <a href="{{route('userpage', ['id' => $post->user->id])}}">
                  <div class="float-right d-flex align-items-center">
                    <div class="icon float-left">
                      @if(isset($post->user->icon))
                      <img src="{{asset('storage/image/'.$post->user->icon)}}" alt="{{ $post->user->icon }}" style="width:30px;height:30px;">
                      @else
                      <img src="{{asset('image/noimage.jpg')}}" alt="{{asset('image/noimage.jpg')}}" style="width:30px;height:30px;">
                      @endif
                    </div>
                    <div class="name float-left h5">
                      {{ $post->user->name }}
                    </div>
                  </div>
                  </a>
                </div>
            </div>
            <a href="{{route('comment.create', [ 'id' => $post->id ])}}" class="float-right">コメントする</a>
        </div>

        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('コメント一覧') }}</div>
            </div>
        </div>

        @if (count($comments) > 0)
        @foreach ($comments as $comment)
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <div class="title" style="white-space:pre-wrap;">{{$comment->comment}}</div>
                  @if(isset($comment->comment_img))
                  <div class="comment_img text-center">
                      <img src="{{asset('storage/image/'.$comment->comment_img)}}" alt="{{ $comment->comment_img }}" style="width:350px;height:250px;">
                  </div>
                  @endif
                  <a href="{{route('userpage', ['id' => $comment->user_id])}}">
                  <div class="float-right d-flex align-items-center">
                    <div class="icon float-left">
                      @if(isset($comment->user->icon))
                      <img src="{{asset('storage/image/'.$comment->user->icon)}}" alt="{{ $comment->user->icon }}" style="width:30px;height:30px;">
                      @else
                      <img src="{{asset('image/noimage.jpg')}}" alt="{{asset('image/noimage.jpg')}}" style="width:30px;height:30px;">
                      @endif
                    </div>
                    <div class="name float-left h5">
                      {{ $comment->user->name }}
                    </div>
                  </div>
                  </a>
                  <div class="float-left">
                    {{ $comment->updated_at }}
                  </div>
                </div>
            </div>
          </a>
        </div>
        @endforeach
        @else
        <div class="col-md-8 h3 text-center mt-5">
          コメントはまだありません。
        </div>
        @endif
    </div>
    <div class="row justify-content-center mt-3">
      {{$comments->links()}}
    </div>
</div>
@endsection
