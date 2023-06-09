<!DOCTYPE html>
@extends('layouts.event')
@section('title', 'イベント情報編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>イベント情報編集</h2>
                <form action="{{ route('admin.event.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">イベント名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">期間</label>
                        <div class="col-md-10">
                            <label><input type="radio" name="gender" value="male" {{ $profile_form->gender == 'male' ? 'checked' : '' }}>男性</label>
                            <label><input type="radio" name="gender" value="female" {{ $profile_form->gender == 'female' ? 'checked' : '' }}>女性</label>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-md-2" for="hobby">場所</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="5">{{ $profile_form->hobby }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">概要</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->p_histories != NULL)
                                @foreach ($profile_form->p_histories as $p_history)
                                    <li class="list-group-item">{{ $p_history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection