@extends('layout')
@section('title','問い合わせ確認')
@section('content')
<div class="container">
    <h1>問い合わせ確認</h1>
    
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('inquiry.send') }}">
            @csrf

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input id="email" name="email" value="{{ $inputs['email'] }}" type="hidden">
                    <div class="form-control-static">{{ $inputs['email'] }}</div>
                </div>

                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input id="title" name="title" value="{{ $inputs['title'] }}" type="hidden">
                    <div class="form-control-static">{{ $inputs['title'] }}</div>
                </div>

                <div class="form-group">
                    <label for="body">お問い合わせ内容</label>
                    <input id="body" name="body" value="{{ $inputs['body'] }}" type="hidden">
                    <div class="form-control-static">{!! nl2br(e($inputs['body'])) !!}</div>
                </div>

                <div class="button-group">
                    <button type="submit" name="action" value="back" class="btn btn-secondary">入力内容修正</button>
                    <button type="submit" name="action" value="submit" class="btn btn-primary">送信する</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
