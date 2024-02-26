<!-- admin.inquiry_reply.blade.php -->
@extends('layouts.admin_layout')

@section('title','問い合わせ返信')
@section('content')
<h2>問い合わせ返信</h2>
<form method="POST" action="{{ route('admin.replies.store', ['inquiry' => $inquiry->id]) }}">
    @csrf
    <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ $inquiry->email }}" readonly>
    </div>
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" name="title" class="form-control" id="title" value="RE: {{ $inquiry->title }}" readonly>
    </div>
    <div class="form-group">
        <label for="body">本文</label>
        <textarea name="body" class="form-control" id="body" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">返信する</button>
    <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
</form>
@endsection
