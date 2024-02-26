<!DOCTYPE HTML>
<html lang="ja">

<>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
  <script src="/js/app.js" defer></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="path-to-your-css-file.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <style>
    body {
      background-color: #cccccc8a;
      background-image: linear-gradient(90deg, rgb(7 50 245 / 0%) 10px, transparent 10px), linear-gradient(90deg, rgb(2 6 202 / 82%) 10px, transparent 10px);
      background-size: 86px 40px;
    }
    .container p {
    word-wrap: break-word; /* 長い単語がはみ出ないように折り返す */
  }
  </style>
</head>

<body>
  <header>
    @include('header')
  </header>
  <div class="header-margin">
    @yield('content')
  </div>

  <div class="p-3 text-center centered-content">
    <h2 class="knbn-title">選手募集中</h2>
        <h1>🌟 草野球メンバー募集中！ 🌟</h1>
        <p>野球が大好きなみんな、一緒に楽しい時間を過ごしましょう！当チームは10代から50代まで幅広い年齢層の仲間たちで構成されています。私たちのモットーは、"<span class="highlight">楽しさ第一</span>"！勝つことも大切ですが、何よりも楽しむことが最優先です。</p>
        <div class="details">
            <p>🏟️ 場所：<span class="highlight">[練習場所の場所をここに記入]</span></p>
            <p>📆 練習日時：<span class="highlight">[練習日程をここに記入]</span></p>
            <p>👥 年齢層：10代から50代まで、幅広い世代が活動中</p>
            <p>🤝 チームの特徴：友情、協力、楽しさを大切に</p>
            <p>⚾ レベル：初心者から経験者まで、どなたでも歓迎</p>
        </div>
        <p>私たちは野球を通じて新しい友達を作り、楽しい瞬間を共有し、スポーツマンシップを大切にしています。一緒に素晴らしい野球体験をしませんか？</p>
        <div class="contact">
            <p>興味がある方は、お気軽にご連絡ください！新しい仲間を迎え入れるのを楽しみにしています。一緒に楽しい野球シーズンを迎えましょう！ ⚾🎉</p>
        </div>
    <a href="{{ route('inquiry.index') }}" class="btn btn-primary">問い合わせはこちら</a>
</div>


  <footer class="footer-002">
    @include('footer')
  </footer>
</body>

</html>