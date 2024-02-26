@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','試合一覧')
@section('content')

<x-alert type="success" :session="session('success')" />
<x-alert type="danger" :session="session('danger')" />

<!-- メインコンテンツ -->
<h1 class="text-center">試合結果一覧</h1>
<div class="d-flex justify-content-end mb-3 game-create">
  <a href="{{ route('admin.game.create') }}" class="btn btn-primary">新規登録</a>
</div>
<div class="container">


  <table class="table">
    <thead>
      <tr>
        <th scope="col">対戦相手</th>
        <th scope="col">試合日時</th>
        <th scope="col">試合コメント</th>
        <th scope="col">登録日</th>
        <th scope="col">更新日</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($games as $game)
      <tr>
        <td>
          <a href="/admin/game/{{ $game->id }}">{{ $game->opponent }}</a>
        </td>
        <td>{{ $game->game_date }}</td>
        <td>{{ $game->game_comment }}</td>
        <td>{{ $game->created_at }}</td>
        <td>{{ $game->updated_at }}</td>
        <td>
          <button type="button" class="btn btn-primary" onclick="location.href='/admin/game/edit/{{ $game->id }}'">編集</button>
        </td>
        <form method="POST" action="{{ route('admin.game.delete', $game->id) }}" onSubmit="return checkDelete()">
          @csrf
          <td>
            <button type="submit" class="btn btn-danger" onclick="">削除</button>
          </td>
        </form>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    <ul class="pagination">
      @if ($games->onFirstPage())
      <li class="page-item disabled">
        <span class="page-link">前へ</span>
      </li>
      @else
      <li class="page-item">
        <a href="{{ $games->previousPageUrl() }}" class="page-link" rel="prev">前へ</a>
      </li>
      @endif

      @for ($i = 1; $i <= $games->lastPage(); $i++)
        <li class="page-item {{ $games->currentPage() == $i ? 'active' : '' }}">
          <a href="{{ $games->url($i) }}" class="page-link">{{ $i }}</a>
        </li>
        @endfor

        @if ($games->hasMorePages())
        <li class="page-item">
          <a href="{{ $games->nextPageUrl() }}" class="page-link" rel="next">次へ</a>
        </li>
        @else
        <li class="page-item disabled">
          <span class="page-link">次へ</span>
        </li>
        @endif
    </ul>
  </div>
</div>



<script>
  function checkDelete() {
    if (window.confirm('試合内容を削除してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection