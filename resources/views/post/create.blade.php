@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <form action="" method="post" class="form-group">
                    @csrf
                    タイトル
                    <input type="text" name="title" class="form-control">
                    <br>

                    コメント
                    <textarea name="text" class="form-control" rows="7">
                    </textarea>
                    <br>
                    画像
                    <div class="custom-file col-md-6">
                      <input type="file" class="custom-file-input form-control" id="inputFile" name="post_img">
                      <label class="custom-file-label" for="inputFile" data-browse="参照">
                        ファイルを選択
                      </label>
                    </div>
                    <br>

                    <div class="m-4">
                      <img src="" class="img-thumbnail" style="width:200px;height:200px;">
                    </div>

                    <input type="submit" class="btn btn-info float-right" value="投稿する">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
