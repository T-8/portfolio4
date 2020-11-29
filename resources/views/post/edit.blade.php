@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <form action="{{route('post.update', ['id' => $post->id])}}" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
                    タイトル
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                    <br>

                    コメント
                    <textarea name="text" class="form-control" rows="7">{{$post->text}}</textarea>
                    <br>

                    画像
                    <div class="form-group">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputFile" name="post_img">
                          <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択</label>
                        </div>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset">取消</button>
                        </div>
                      </div>
                    </div>
                    <br>

                    <input type="submit" class="btn btn-info float-right" value="更新する">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
