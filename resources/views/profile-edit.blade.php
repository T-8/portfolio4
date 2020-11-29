@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                  <form action="{{route('profile-update', ['id' => $user->id])}}" method="post" class="form-group" enctype="multipart/form-data">
                    @csrf
                    名前
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    <br>

                    メールアドレス
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    <br>

                    アイコン
                    <div class="form-group">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputFile" name="icon">
                          <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択</label>
                        </div>
                        <div class="input-group-append">
                          <button type="button" class="btn btn-outline-secondary input-group-text" id="inputFileReset">取消</button>
                        </div>
                      </div>
                    </div>

                    コメント
                    <textarea name="comment" class="form-control" rows="7">{{ $user->comment }}</textarea>
                    <br>

                    <input type="submit" class="btn btn-info float-left" value="更新する">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
