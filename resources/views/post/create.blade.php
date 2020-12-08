@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <form action="{{route('post.store')}}" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
                    タイトル
                    <input type="text" name="title" class="form-control">
                    <br>

                    コメント
                    <textarea name="text" class="form-control" rows="7">
                    </textarea>
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

                    <input type="submit" class="btn btn-info float-right" value="投稿する">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
