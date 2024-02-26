@extends('layout')

@section('title', '送信完了ページ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="mt-3">お問い合わせ完了</h2>
                        </div>
                        
                        <div class="alert alert-success mt-3">
                            お問い合わせいただき、ありがとうございました。送信した内容は受信メールにてご確認ください。
                        </div>

                        <!-- 他のコンテンツやメッセージをここに追加できます -->

                        <div class="text-center mt-3">
                            <a href="{{ route('home') }}" class="btn btn-primary">ホームへ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
