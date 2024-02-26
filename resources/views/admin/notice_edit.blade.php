@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','お知らせ編集')
@section('content')


<x-alert type="success" :session="session('success')" />
<!-- メインコンテンツ -->
<div class="container">
    <h2>お知らせ情報編集</h2>
    <form method="POST" action="{{ route('admin.notice.update') }}" onSubmit="return checkSubmit()">
        @csrf
        <input type="hidden" name="id" value="{{ $notice->id }}">

        <div class="form-group">
            <label for="notice_title">お知らせタイトル</label>
            <input type="text" name="notice_title" class="form-control" value="{{ $notice->notice_title }}">
        </div>
        @if ($errors->has('notice_title'))
        <div class="text-danger">
            {{ $errors->first('notice_title') }}
        </div>
        @endif

        <div class="form-group">
            <label for="notice_text">お知らせ内容</label>
            <textarea name="notice_text" class="form-control" rows="10">{{ $notice->notice_text }}</textarea>
        </div>
        @if ($errors->has('notice_text'))
        <div class="text-danger">
            {{ $errors->first('notice_text') }}
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