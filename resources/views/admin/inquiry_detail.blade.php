@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','問い合わせ詳細')
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

  .reply-btn {
    display: flex;
    flex-direction: column; /* 縦に要素を積むように設定 */
    align-items: center; /* 要素を中央に配置 */
    padding: 10px 0; /* 上下の余白を追加 */
}

/* 返信するボタンはスタイルを適用 */
.reply-btn .btn-primary:first-child {
    width: 50%;
}

/* 戻るボタンの変更 */
.back-btn {
  margin-top: 20px;
}
</style>
<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />

<!-- メインコンテンツ -->
<div class="notice">
  <h3 class="notice-title">{{ $inquiry->title }}</h3>
  <p class="notice-date">{{ \Carbon\Carbon::parse($inquiry->created_at)->format('Y-m-d') }}</p>
  <div class="notice-content">
    <p>{{ $inquiry->body }}</p>
  </div>
</div>

@if(count($replies) > 0)
<h3>下記のように返信しています</h3>
  <div class="related-records">
    <h3>関連するレコード:</h3>
    <ul>
      @foreach($replies as $reply)
        <li>{{ $reply->body }} - {{ $reply->description }}</li>
        <li>{{ $reply->created_at }}</li>
      @endforeach
    </ul>
  </div>
@else
  <p>関連するレコードはありません。</p>
@endif

<!-- 返信ボタン -->
<div class="reply-btn">
    <a href="{{ route('admin.replies.index', ['inquiry' => $inquiry->id]) }}" class="btn btn-primary">返信する</a>
    <a href="javascript:history.back()" class="btn btn-primary back-btn">戻る</a>
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