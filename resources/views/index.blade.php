@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('記事一覧') }}</div>
            </div>
        </div>

        <div class="col-md-8">
          <a href="{{route('register')}}">
            <div class="card">
                <div class="card-body">
                  <div class="title h3">
                    title
                  </div>
                  <div class="float-right">
                    <div class="icon float-left">
                      icon
                    </div>
                    <div class="name float-left">
                      名前
                    </div>
                  </div>
                </div>
            </div>
          </a>
        </div>
    </div>
</div>
@endsection
