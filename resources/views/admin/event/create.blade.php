{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.event')


{{-- layouts.blade.phpの@yield('title')に'プロフィール'を埋め込む --}}
@section('title', 'イベント情報')

{{-- layouts.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>イベント情報</h2>
                <form action="{{ route('admin.event.create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">イベント名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">期間</label>
                        <div class="col-md-10">
                            <label><input type="radio" name="gender" value="male">男性</label>
                            <label><input type="radio" name="gender" value="female">女性</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">場所</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="5">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">概要</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ old('in') }}</textarea>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection