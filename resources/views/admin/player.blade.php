@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','選手一覧')
@section('content')

<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />

<!-- メインコンテンツ -->
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">選手名</th>
        <th scope="col">選手ID</th>
        <th scope="col">ポジション</th>
        <th scope="col">背番号</th>
        <th scope="col">打率</th>
        <th scope="col">防御率</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($players as $player)
      <tr>
        <td>
          <a href="/admin/player/{{ $player->id }}">{{ $player->player_name }}</a>
        </td>
        <td>{{ $player->id }}</td>
        <td>{{ $player->position }}</td>
        <td>{{ $player->uniform_number }}</td>
        <td>{{ $player->avg }}</td>
        <td>
          @if($player->inning > 0 || $player->position == '投手')
          {{ $player->era }}
          @endif
        </td>
        <td>
          <button type="button" class="btn btn-primary" onclick="location.href='/admin/player/edit/{{ $player->id }}'">編集</button>
        </td>
        <form method="POST" action="{{ route('admin.player.delete', $player->id) }}" onSubmit="return checkDelete()">
          @csrf
          <td>
            <button type="submit" class="btn btn-primary" onclick="">削除</button>
          </td>
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <ul class="pagination">
      @if ($players->onFirstPage())
      <li class="page-item disabled">
        <span class="page-link">前へ</span>
      </li>
      @else
      <li class="page-item">
        <a href="{{ $players->previousPageUrl() }}" class="page-link" rel="prev">前へ</a>
      </li>
      @endif

      @for ($i = 1; $i <= $players->lastPage(); $i++)
        <li class="page-item {{ $players->currentPage() == $i ? 'active' : '' }}">
          <a href="{{ $players->url($i) }}" class="page-link">{{ $i }}</a>
        </li>
        @endfor

        @if ($players->hasMorePages())
        <li class="page-item">
          <a href="{{ $players->nextPageUrl() }}" class="page-link" rel="next">次へ</a>
        </li>
        @else
        <li class="page-item disabled">
          <span class="page-link">次へ</span>
        </li>
        @endif
    </ul>
  </div>
</div>
<div class="d-flex justify-content-end mb-3">
  <a href="{{ route('admin.player.create') }}" class="btn btn-primary">新規登録</a>
</div>
</div>

<script>
  function checkDelete() {
    if (window.confirm('選手を削除してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection