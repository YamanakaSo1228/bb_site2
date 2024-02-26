@extends('layout')
@section('title','選手情報')
@section('content')

<style>
  .sample_h_14{
    
    font-size: 50px;
  }
</style>
<div class="row">

</div>

<div class="l-wrapper_02 card-radius_02">
  <article class="card_02">
    <div class="card__header_02">
      <figure class="card__thumbnail_02">
        @if (is_null($players->image))
        <img src="{{ asset('images/360_F_641132438_OFsXHCH97IJ1VqToSRsSPlFgxG7T7stg.jpg') }}" class="card__image_02" alt="...">
        @else
        <img src="{{ asset('storage/' . $players->image) }}" alt="選手画像" class="card__image_02">
        @endif
      </figure>
    </div>
    <p class="card__title_02 sample_h_14">{{ $players->player_name }}</p>
    <table class="table table-striped player-pc">
      <thead>
        <tr>
          <th>打席数</th>
          <th>安打数</th>
          <th>打率</th>
          <th>打点</th>
          <th>本塁打</th>
          <th>出塁率</th>
          <th>長打率</th>
          <th>試合数</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $players->count }}</td>
          <td>{{ $players->hit }}</td>
          <td>{{ $players->avg }}</td>
          <td>{{ $players->rbi }}</td>
          <td>{{ $players->home_run }}</td>
          <td>{{ $players->base_avg }}</td>
          <td>{{ $players->long_avg }}</td>
          <td>{{ $players->game_count }}</td>
        </tr>
      </tbody>
      <thead>
        <tr>
          <th>投球回</th>
          <th>失点数</th>
          <th>防御率</th>
          <th>登板試合数</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $players->inning }}</td>
          <td>{{ $players->conceded_points }}</td>
          <td>{{ $players->era }}</td>
          <td>{{ $players->pitched }}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-striped player-sp">
      <tr>
        <th>打席数</th>
        <td>{{ $players->count }}</td>
      </tr>
      <tr>
        <th>安打数</th>
        <td>{{ $players->hit }}</td>
      </tr>
      <tr>
        <th>打率</th>
        <td>{{ $players->avg }}</td>
      </tr>
      <tr>
        <th>打点</th>
        <td>{{ $players->rbi }}</td>
      </tr>
      <tr>
        <th>本塁打</th>
        <td>{{ $players->home_run }}</td>
      </tr>
      <tr>
        <th>出塁率</th>
        <td>{{ $players->base_avg }}</td>
      </tr>
      <tr>
        <th>長打率</th>
        <td>{{ $players->long_avg }}</td>
      </tr>
      <tr>
        <th>試合数</th>
        <td>{{ $players->game_count }}</td>
      </tr>
    </table>

    <div class="card__body_02">
      <p class="card__text2_02">これはカード型のデザインです。これはカード型のデザインです。これはカード型のデザインです。これはカード型のデザインです。これはカード型のデザインです。これはカード型のデザインです。これはカード型のデザインです。これはカード型のデザインです。これはカード型のデザインです。</p>
    </div>
  </article>
</div>
<!-- <div class="card-group">
  <div class="card">
    @if (is_null($players->image))
    <img src="{{ asset('images/hearts_blue.jpg') }}" class="card-img-top" alt="...">
    @else
    <img src="{{ asset('storage/' . $players->image) }}" alt="選手画像">
    @endif
    <h1>{{ $players->player_name }}</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>試合数</th>
          <th>安打数</th>
          <th>打率</th>
          <th>打点</th>
          <th>本塁打</th>
          <th>出塁率</th>
          <th>長打率</th>
          <th>試合数</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $players->count }}</td>
          <td>{{ $players->hit }}</td>
          <td>{{ $players->avg }}</td>
          <td>{{ $players->rbi }}</td>
          <td>{{ $players->home_run }}</td>
          <td>{{ $players->base_avg }}</td>
          <td>{{ $players->long_avg }}</td>
          <td>{{ $players->game_count }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div> -->

<style>
  .l-wrapper_02 {
    margin: 1rem auto;
    width: 80%;
  }

  .card-radius_02 {
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, .2);
  }

  .card_02 {
    background-color: #fff;
    box-shadow: 0 0 0px rgba(0, 0, 0, .16);
    color: #212121;
    text-decoration: none;
  }

  .card__title_02 {
    padding: 1rem 1.5rem 0;
    font-size: 3rem;
    order: 1;
    font-weight: bold;
    text-decoration: none;
    /*線の種類（実線） 太さ 色*/
    border-bottom: solid 3px black;
    background: linear-gradient(transparent 70%, #a7d6ff 70%);
  }

  .card__thumbnail_02 {
    margin: 0;
    order: 0;
  }

  .card__image_02 {
    width: 100%;
  }

  .card__body_02 {
    padding: 0 1.5rem;
  }

  .card__text_02 {
    font-size: .8rem;
    text-align: center;
    text-decoration: none;
  }

  .card__text2_02 {
    font-size: .8rem;
    margin-top: 0;
    margin-bottom: 1.5rem;
  }
</style>

@endsection