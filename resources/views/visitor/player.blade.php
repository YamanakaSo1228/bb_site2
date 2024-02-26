@extends('layout')
@section('title', '選手一覧')
@section('content')
@if(Session::has('error'))
<!-- <div class="alert alert-danger">
  {{ Session::get('error') }}
</div> -->
@endif
<div class="container">
  <h1 class="my-4">選手一覧</h1>
  <div class="row">
    @foreach($players as $player)
    <div class="col-md-4 mb-4">
      <div class="card">
        <a href="/member/{{ $player->id }}">
          @if (is_null($player->image))
          <img src="{{ asset('images/360_F_641132438_OFsXHCH97IJ1VqToSRsSPlFgxG7T7stg.jpg') }}" class="card-img-top" alt="...">
          @else
          <img src="{{ asset('storage/' . $player->image) }}" alt="選手画像" class="card-img-top">
          @endif
        </a>
        <div class="card-body">
          <a href="/member/{{ $player->id }}">
            <h5 class="card-title">{{ $player->player_name }}</h5>
          </a>
          <ul class="list-unstyled">
            <li>背番号: {{ $player->uniform_number }}</li>
            <li>ポジション: {{ $player->position }}</li>
            <li>打率: {{ $player->avg }}</li>
            @if($player->position == '投手')
            <li>
              @if ($player->era !== null)
              @if (number_format($player->era, 2) == intval($player->era))
              防御率: {{ number_format($player->era, 2, '.', '') }}
              @else
              防御率: {{ number_format($player->era, 2) }}
              @endif
              @else
              @endif

            </li>
            @endif
          </ul>
          <a href="/member/{{ $player->id }}" class="btn-square-little-rich">もっと見る</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection

<style>
  .btn-square-little-rich {
    position: relative;
    display: inline-block;
    padding: 0.25em 0.5em;
    text-decoration: none;
    color: #FFF;
    background: #03A9F4;
    /*色*/
    border: solid 1px #0f9ada;
    /*線色*/
    border-radius: 4px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2);
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
    width: 100%;
    text-align: center;
  }

  .btn-square-little-rich:active {
    /*押したとき*/
    border: solid 1px #03A9F4;
    box-shadow: none;
    text-shadow: none;
  }

  /* カード間の間隔を調整 */
  .mb-4 {
    margin-bottom: 20px;
    /* 20pxのマージンを追加 */
  }

  /* カード全体の余白を調整 */
  .card {
    padding: 15px;
    /* 上下左右に15pxの余白を追加 */
  }

  /* 選手名のスタイルを調整 */
  .card-title {
    font-size: 1.25rem;
    /* 選手名のフォントサイズを大きくする */
    margin-bottom: 10px;
    /* 選手名の下に余白を追加 */
  }
</style>