@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header h2">
                {{ $user->name }}
              </div>
                <div class="card-body">
                  <div class="float-left mr-3">
                    @if(isset($user->icon))
                    <img src="{{asset('storage/image/'.$user->icon)}}" alt="{{$user->icon}}" style="width:150px;height:150px">
                    @else
                    <img src="{{asset('image/noimage.jpg')}}" alt="" style="width:150px;height:150px">
                    @endif
                  </div>
                  <div class="float-left" style="width:500px;">
                      {{ $user->comment }}
                  </div>
                </div>
            </div>
            @if(Auth::user()->id == $user->id)
            <div class="plof-edit float-right">
              <a href="{{ route('profile-edit', ['id' => Auth::user()->id]) }}">プロフィール編集</a>
            </div>
            @endif
          </div>

          <div class="col-md-8 mt-2">
              <div class="card">
                @if(Auth::user()->id == $user->id)
                  <div class="card-header">{{ __('スレッド一覧') }}</div>
                @else
                 <div class="card-header">{{ __($user->name.'さんのスレッド一覧') }}</div>
                @endif
              </div>
              @if (count($posts) > 0)
              @foreach ($posts as $post)
                <a href="{{route('post.show', ['id' => $post->id])}}" class="text-decoration-none">
                  <div class="card">
                      <div class="card-body">
                        <div class="title h3">
                          {{ $post->title }}
                        </div>
                        <div class="float-right mt-3">
                          {{ $post->updated_at }}
                        </div>
                      </div>
                  </div>
                </a>
              @endforeach
              @else
              <div class="h3 text-center mt-3">
                投稿はまだありません。
              </div>
              @endif
            </div>
        </div>
        <div class="row justify-content-center mt-3">
          {{$posts->links()}}
        </div>

        </div>
@endsection
