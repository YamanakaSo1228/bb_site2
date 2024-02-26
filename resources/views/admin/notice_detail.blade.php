@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','お知らせ詳細')
@section('content')
<style>
  .notice {
  text-align: center;
  padding: 20px;
  margin-bottom: 20px;
  border: 1px solid #ddd;
}

.notice-title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.notice-date {
  font-size: 16px;
  color: #888;
}

.notice-content {
  margin-top: 20px;
  font-size: 18px;
}

</style>
<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')"/>

<!-- メインコンテンツ -->
<div class="notice">
    <h3 class="notice-title">{{ $notice->notice_title }}</h3>
    <p class="notice-date">{{ \Carbon\Carbon::parse($notice->created_at)->format('Y-m-d') }}</p>
    <div class="notice-content">
        <p>{{ $notice->notice_text }}</p>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
    <button type="button" class="btn btn-primary" onclick="location.href='/admin/notice/edit/{{ $notice->id }}'">編集</button>

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