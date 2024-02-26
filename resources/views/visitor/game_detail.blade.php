@extends('layout')
@section('title','試合結果詳細')
@section('content')

<style>
  .score-table {
    width: 80%;
  }
</style>

<div class="score-container game-result">
  <h2 class="opponent-header text-center">VS {{ $game->opponent }}</h2>
  <table class="score-table border game-result">
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
        <td>ホームチーム</td>
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
        <td>ビジターチーム</td>
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
@endsection