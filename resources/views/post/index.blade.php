@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header p-3">
                    <div class="h4 m-3">{{ __('スレッド一覧　') }}</div>
                    <form method="get" action="{{route('post.index')}}" class="form-inline float-right">
                      <input type="search" name="search" placeholder="検索ワード" class="form-control mr-1">
                      <input type="submit" value="検索" class="btn btn-outline-success">
                    </form>
                </div>
            </div>
        </div>

        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="col-md-8 mb-1">
          @if(isset(Auth::user()->id))
          <a href="{{route('post.show', ['id' => $post->id])}}" class="text-decoration-none">
          @else
          <a href="{{route('post.no_auth_show', ['id' => $post->id])}}" class="text-decoration-none">
          @endif
            <div class="card">
                <div class="card-body">
                  <div class="title h3">
                    {{ $post->title }}
                  </div>
                  <div class="float-right">
                    <div class="icon float-left">
                      @if(isset($post->user->icon))
                      <img src="{{asset('storage/image/'.$post->user->icon)}}" alt="{{ $post->user->icon }}" style="width:25px;height:25px;">
                      @else
                      <img src="{{asset('image/noimage.jpg')}}" alt="{{ $post->user->icon }}" style="width:25px;height:25px;">
                      @endif
                    </div>
                    <div class="name float-left h5">
                      {{ $post->user->name }}
                    </div>
                  </div>
                  <div class="float-left">
                    {{ $post->updated_at }}
                  </div>
                </div>
            </div>
          </a>
        </div>
        @endforeach
        @else
        <div class="col-md-8 h3 text-center mt-5">
          投稿はまだありません。
        </div>
        @endif
    </div>
    <div class="row justify-content-center mt-3">
      {{$posts->links()}}
    </div>
</div>
@endsection
