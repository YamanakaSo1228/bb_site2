@extends('layout')
@section('title', '試合一覧')
@section('content')
@if(Session::has('error'))
<div class="alert alert-danger">
  {{ Session::get('error') }}
</div>
@endif
<style>
  .button005 a {
    border-radius: 3px;
    position: relative;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 0 auto;
    margin-top: 10px;
    margin-bottom: 10px;
    max-width: 220px;
    padding: 10px 25px;
    color: #FFF;
    transition: 0.3s ease-in-out;
    font-weight: 600;
    background: rgb(149,202,252);
    background: linear-gradient(270deg, rgb(65 105 239) 0%, rgb(0 76 247) 100%);
}
.button005 a:hover {
    background: rgb(117,188,255);
    background: linear-gradient(270deg, rgba(117,188,255,1) 0%, rgba(62,159,252,1) 100%);
}

.button005-title {
    text-align: center;
    background: #0026b1;
    padding: 10px;
    width: 100%;
    color: white;
    font-size: 20px;
}
</style>
<div class="result-image">
  <img src="{{ asset('images/5A962AD8-4680-4819-82D0-EE1C7ECA8CD2_1_105_c.jpeg') }}" alt="画像">
  <div class="result-text">
    <h1 class="text-center">試合結果一覧</h1>
  </div>
</div>
<div class="container game-result">
  <div class="row">
    <div class="col-md-3">
      <nav class="year-links">
        <ul class="nav flex-column">
          <li class="nav-item">
          <div class="button005-title" >
            シーズン
          </div>
          </li>
          @for ($year = date('Y'); $year >= 2022; $year--)
          <li class="nav-item">
          <div class="button005" >
            <a class="nav-link" href="{{ route('game', ['y' => $year]) }}">{{ $year }} 年</a>
          </div>
          </li>
          @endfor

        </ul>
      </nav>
    </div>
    <div class="col-md-9">
      @foreach($games as $game)
      <div class="score-container">
        <h3 class="opponent-header">VS {{ $game->opponent }}　{{ $game->game_date }}</h3>
        <div class="table-wrapper">
          <table class="score-table border">
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
                <td class="nowrap">{{ $game->opponent }}</td>
                @else
                <td class="nowrap"><span style="color: blue;">★</span>BLUE HEARTS</td>
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
                <td class="nowrap">{{ $game->opponent }}</td>
                @else
                <td class="nowrap"><span style="color: blue;">★</span>BLUE HEARTS</td>
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
        <!-- 下記は一旦保留（そもそも試合結果に詳細は必要？？）
        <div class="text-center">
          <a href="/game/{{ $game->id }}" class="btn btn-primary game-detail">試合結果：詳細を見る</a>
        </div> -->
        <br>
        <p class="game-comment">{{ $game->game_comment }}</p>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection