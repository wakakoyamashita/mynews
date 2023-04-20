{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- layouts.blade.phpの@yield('title')に'プロフィール'を埋め込む --}}
@section('title', 'MYプロフィール')

{{-- layouts.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>MYプロフィール</h2>
                <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-md-2">氏名(name)</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="name" rows="1">{{ old('name') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">性別(gender)</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="gender" rows="1">{{ old('gender') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">趣味(hobby)</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="hobby" rows="5">{{ old('hobby') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">自己紹介欄(introduction)</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="10">{{ old('in') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>


  
                    
@endsection