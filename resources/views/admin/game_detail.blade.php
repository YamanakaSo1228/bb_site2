@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','試合詳細')
@section('content')

<x-alert type="success" :session="session('success')" />
<!-- メインコンテンツ -->
<h2 class="opponent-header">VS {{ $game->opponent }}</h2>
<table class="admin-score-table border">
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
<div class="d-flex justify-content-center mb-3">
  <button type="button" class="btn btn-primary edit-link" onclick="location.href='/admin/game/edit/{{ $game->id }}'">編集</button>
  <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
</div>


@endsection