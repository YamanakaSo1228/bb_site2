@extends('layout')
@section('title', '問い合わせ')
@section('content')
<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />
<div class="container inquiry">
    <h1>問い合わせフォーム</h1>

    <form action="{{ route('inquiry.confirm') }}" method="POST" class="inquiry-form">
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
        <a href="{{ route('privacy') }}" target="_blank" style="color: #0006ff;font-size: 18px;padding: 3px;background: #ffffff;">プライバシーポリシーを読む</a><br>
      <label for="agree"> プライバシーポリシーを確認し、同意しました。</label>
      <input type="checkbox" name="agree_privacy" id="agree" value="" required="required" /><br>
        <button name="confirm" type="submit" id="submit" class="btn btn-primary" readonly="readonly">入力内容確認</button>
    </form>
</div>

<style>
    .required {
        color: white;
        background: red;
        border-radius: 3px; /* 角を丸くする */
        padding: 2px 6px; /* マークの周りの余白を設定 */
    }

    form.inquiry-form {
        padding: 15px;
    }
</style>

<script>
  $(function() {
    $('#submit').prop('disabled', true);
    
    // チェックボックスの初期状態を確認
    if ($('#agree').prop('checked') == false) {
        $('#submit').css('background-color', 'white'); // ボタンの背景色を白に変更
        $('#submit').css('color', 'black'); // ボタンの文字色を黒に変更
    }
    
    $('#agree').on('click', function() {
        if ($(this).prop('checked') == false) {
            $('#submit').prop('disabled', true);
            $('#submit').css('background-color', 'white'); // ボタンの背景色を白に変更
            $('#submit').css('color', 'black'); // ボタンの文字色を黒に変更
        } else {
            $('#submit').prop('disabled', false);
            $('#submit').css('background-color', ''); // ボタンの背景色をデフォルトに戻す
            $('#submit').css('color', ''); // ボタンの文字色をデフォルトに戻す
        }
    });
});


</script>

@endsection
