@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','チーム紹介編集')
@section('content')


<x-alert type="success" :session="session('success')" />
<!-- メインコンテンツ -->
<div class="container">
    <h2>チーム紹介編集</h2>
    <form method="POST" action="{{ route('admin.team.update') }}" onSubmit="return checkSubmit()">
        @csrf
        <input type="hidden" name="id" value="{{ $team->id }}">

        <div class="form-group">
            <label for="team_title">お知らせタイトル</label>
            <input type="text" name="team_title" class="form-control" value="{{ $team->team_title }}">
        </div>
        @if ($errors->has('team_title'))
        <div class="text-danger"></div>
            {{ $errors->first('team_title') }}
        </div>
        @endif

        <div class="form-group">
            <label for="team_text">お知らせ内容</label>
            <textarea name="team_text" class="form-control" rows="10">{{ $team->team_text }}</textarea>
        </div>
        @if ($errors->has('team_text'))
        <div class="text-danger">
            {{ $errors->first('team_text') }}
        </div>
        @endif

        <button type="submit" class="btn btn-primary">登録</button>
        <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
    </form>
</div>

<script>
    function checkSubmit() {
        if (window.confirm('更新してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>


@endsection