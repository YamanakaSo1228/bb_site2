@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','選手詳細')
@section('content')

<x-alert type="success" :session="session('success')"/>
<!-- メインコンテンツ -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">選手名</th>
      <th scope="col">選手ID</th>
      <th scope="col">ポジション</th>
      <th scope="col">背番号</th>
      <th scope="col">打率</th>
      <th scope="col">防御率</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <a href="/admin/player/{{ $player->id }}">{{ $player->player_name }}</a>
      </td>
      <td>{{ $player->id }}</td>
      <td>{{ $player->position }}</td>
      <td>{{ $player->uniform_number }}</td>
      <td>{{ $player->avg }}</td>
      <td>
        @if($player->position == '投手')
        {{ $player->era }}
        @endif
      </td>
    </tr>
  </tbody>
</table>
<div class="row align-items-start">
    <div class="col-12 mb-2">
      <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/player/edit/{{ $player->id }}'">編集</button>
    </div>
    <div class="col-12">
        @if (is_null($player->image))
            <img src="{{ asset('images/hearts_blue.jpg') }}" class="admin-player" alt="...">
        @else
            <img src="{{ asset('storage/' . $player->image) }}" alt="選手画像" class="admin-player">
        @endif
    </div>
</div>


@endsection
