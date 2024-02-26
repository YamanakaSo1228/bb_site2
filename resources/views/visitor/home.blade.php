@extends('layout')
@section('title','ホーム')
@section('content')
<div class="position-relative d-flex justify-content-center">
  <img src="{{ asset('images/DSC00784.JPG') }}" alt="画像" class="home-image">
  <div class="image-text position-absolute top-50 start-50 translate-middle text-center">
    <h2>BLUEHEARTは幅広い年齢を大歓迎いたします！！</h2>
    <p>
      テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト
    </p>
  </div>
</div>
<div class="sp-image-text">
  <h2>BLUEHEARTは幅広い年齢を大歓迎いたします！！</h2>
  <p>
    テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト
  </p>
</div>
<!-- <div class="d-flex justify-content-center">
    <img src="{{ asset('images/1000_F_243881132_TKKo6WJMNkU1fe23ZEcKbqAIXvlC7OOQ.jpg') }}" alt="画像"> -->

<div class="container-fluid bg-blue">
  <h1 class="text-center game-result">試合結果</h1>
  <div class="game-result">
    @foreach($games as $game)
    <h3 class="opponent-header">VS {{ $game->opponent }}　({{ $game->game_date }})</h3>
    <div class="score-table-container">
      <table class=" score-table border">
        <thead>
          <tr>
            <th>チーム</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>R</th>
            <th>H</th>
            <th>E</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @if($game->flip == 0)
            <td>{{ $game->opponent }}</td>
            @else
            <td><span style="color: blue;">★</span>BLUE HEARTS</td>
            @endif
            <td>{{ $game->top_first }}</td>
            <td>{{ $game->top_second }}</td>
            <td>{{ $game->top_third }}</td>
            <td>{{ $game->top_fourth }}</td>
            <td>{{ $game->top_fifth }}</td>
            <td>{{ $game->top_sixth }}</td>
            <td>{{ $game->top_seventh }}</td>
            <td>{{ $game->top_eighth }}</td>
            <td>{{ $game->top_ninth }}</td>
            <td>{{ $game->top_total }}</td>
            <td>{{ $game->top_hit }}</td>
            <td>{{ $game->top_error }}</td>
          </tr>
          <tr>
            @if($game->flip == 1)
            <td>{{ $game->opponent }}</td>
            @else
            <td><span style="color: blue;">★</span>BLUE HEARTS</td>
            @endif
            <td>{{ $game->bottom_first }}</td>
            <td>{{ $game->bottom_second }}</td>
            <td>{{ $game->bottom_third }}</td>
            <td>{{ $game->bottom_fourth }}</td>
            <td>{{ $game->bottom_fifth }}</td>
            <td>{{ $game->bottom_sixth }}</td>
            <td>{{ $game->bottom_seventh }}</td>
            <td>{{ $game->bottom_eighth }}</td>
            <td>{{ $game->bottom_ninth }}</td>
            <td>{{ $game->bottom_total }}</td>
            <td>{{ $game->bottom_hit }}</td>
            <td>{{ $game->bottom_error }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    @endforeach
    <div class="text-center">
      <a href="{{ route('game') }}" class="btn btn-primary game-detail">もっと見る</a>
    </div>
  </div>

  <div class="container">
    <h2 class="notice">お知らせ</h2>
    @foreach($notices as $index => $notice)
    <a href="/notice/{{ $notice->id }}">
      <article class="notice-item {{ $index >= 3 ? 'hidden' : '' }}">
        <div class="card mb-3">
          <div class="card-body">
            <h2 class="card-title notice-title">{{ $notice->notice_title }}</h2>
            <p class="card-text notice-text">{{ $notice->notice_text }}</p>
          </div>
        </div>
      </article>
    </a>
    @endforeach
    @if(count($notices) > 3)
    <div class="btn-box">
      <div class="text-center">
        <button id="toggleButton" class="btn btn-primary game-detail">もっと見る</button>
      </div>
    </div>
    @endif
  </div>


  <style>
    .notice {
      text-align: center;
      margin-top: 20px;
    }

    .notice-item {
      border: 1px solid #ccc;
      padding: 20px;
      margin-bottom: 20px;
      background-color: #f8f9fa;
    }

    .notice-title {
      font-size: 24px;
      margin-bottom: 10px;
      color: #333;
      /* タイトルのテキストカラーを変更 */
    }

    .notice-text {
      font-size: 16px;
      color: #555;
      /* テキストのテキストカラーを変更 */
    }

    .btn-box {
      margin-top: 20px;
    }

    /* もっと見るボタンのスタイルを変更 */
    #toggleButton {
      background-color: #007bff;
      color: #fff;
      border: none;
    }
  </style>



</div>

<script>
  const toggleButton = document.getElementById('toggleButton');
  const moreItems = document.querySelectorAll('.more');

  toggleButton.addEventListener('click', () => {
    for (let i = 3; i < moreItems.length; i++) {
      moreItems[i].classList.toggle('hidden');
    }

    if (toggleButton.textContent === 'もっと見る') {
      toggleButton.textContent = '閉じる';
    } else {
      toggleButton.textContent = 'もっと見る';
    }
  });
</script>



@endsection