@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','お知らせ登録')
@section('content')

<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')"/>

<style>
    .form-control {
        width: 100%;
    }
</style>

<!-- メインコンテンツ -->
<div class="container">
    <h2>お知らせ情報登録</h2>
    <form method="POST" action="{{ route('admin.notice.store') }}" onSubmit="return checkSubmit()">
        @csrf

        <div class="form-group">
            <label for="notice_title">お知らせタイトル</label>
            <input type="text" name="notice_title" class="form-control" value="{{ old('notice_title') }}">
        </div>
        @if ($errors->has('notice_title'))
        <div class="text-danger">
            {{ $errors->first('notice_title') }}
        </div>
        @endif

        <div class="form-group">
            <label for="notice_text">お知らせ内容</label>
            <textarea name="notice_text" class="form-control" rows="10">{{ old('notice_text') }}</textarea>
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
    function checkDelete() {
        if (window.confirm('選手を削除してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection