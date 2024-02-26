@extends('layout')
@section('title', '問い合わせ')
@section('content')
<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />
<div class="container">
    <h1>問い合わせフォーム</h1>

    <form action="{{ route('visitor.contact.confirm') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">メールアドレス<span class="required">必須</span></label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" type="text">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">タイトル<span class="required">必須</span></label>
            <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" type="text">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">お問い合わせ内容<span class="required">必須</span></label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5">{{ old('body') }}</textarea>
            @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">入力内容確認</button>
    </form>
</div>

<style>
    .required {
        color: white;
        background: red;
        border-radius: 3px; /* 角を丸くする */
        padding: 2px 6px; /* マークの周りの余白を設定 */
    }
</style>

@endsection
