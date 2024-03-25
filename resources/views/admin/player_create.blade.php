@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">
<script src="{{ mix('js/playerCreate.js') }}"></script>

@section('title','選手登録')
@section('content')

<x-alert type="success" :session="session('success')" />

<!-- メインコンテンツ -->
<div class="container">
    <h2>選手情報登録</h2>
    <form method="POST" action="{{ route('admin.player.store') }}" onSubmit="return checkSubmit()" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="position">ポジション</label>
            <select name="position" class="form-control">
                <option value="1">監督</option>
                <option value="2">コーチ</option>
                <option value="3">マネージャー</option>
                <option value="4">投手</option>
                <option value="5">捕手</option>
                <option value="6">内野手</option>
                <option value="7">外野手</option>
            </select>
        </div>
        @if ($errors->has('position'))
        <div class="text-danger">
            {{ $errors->first('position') }}
        </div>
        @endif

        <div class="form-group">
            <label for="uniform_number">背番号</label>
            <input type="number" name="uniform_number" class="form-control" value="{{ old('uniform_number') }}">
        </div>
        @if ($errors->has('uniform_number'))
        <div class="text-danger">
            {{ $errors->first('uniform_number') }}
        </div>
        @endif

        <div class="form-group">
            <label for="player_name">選手名</label>
            <input type="text" name="player_name" class="form-control" value="{{ old('player_name') }}">
        </div>
        @if ($errors->has('player_name'))
        <div class="text-danger">
            {{ $errors->first('player_name') }}
        </div>
        @endif

        <div class="form-group">
            <label for="count">打席数</label>
            <input type="number" name="count" id="count" class="form-control" value="{{ old('count') }}">
        </div>
        @if ($errors->has('count'))
        <div class="text-danger">
            {{ $errors->first('count') }}
        </div>
        @endif

        <div class="form-group">
            <label for="at_bats">打数</label>
            <input type="number" name="at_bats" id="at_bats" class="form-control" value="{{ old('at_bats') }}">
        </div>
        @if ($errors->has('at_bats'))
        <div class="text-danger">
            {{ $errors->first('at_bats') }}
        </div>
        @endif

        <div class="form-group">
            <label for="hit">安打数</label>
            <input type="number" name="hit" id="hit" class="form-control" value="0">
        </div>
        @if ($errors->has('hit'))
        <div class="text-danger">
            {{ $errors->first('hit') }}
        </div>
        @endif

        <div class="form-group">
            <label for="doubles">二塁打</label>
            <input type="number" name="doubles" id="doubles" class="form-control" value="0">
        </div>
        @if ($errors->has('doubles'))
        <div class="text-danger">
            {{ $errors->first('doubles') }}
        </div>
        @endif

        <div class="form-group">
            <label for="triples">三塁打</label>
            <input type="number" name="triples" id="triples" class="form-control" value="0">
        </div>
        @if ($errors->has('triples'))
        <div class="text-danger">
            {{ $errors->first('triples') }}
        </div>
        @endif

        <div class="form-group">
            <label for="avg">打率</label>
            <input type="text" name="avg" id="avg" class="form-control" value="{{ old('avg') }}" readonly>
        </div>
        @if ($errors->has('avg'))
            <div class="text-danger">
                {{ $errors->first('avg') }}
            </div>
        @endif


        <div class="form-group">
            <label for="rbi">打点数</label>
            <input type="number" name="rbi" class="form-control" value="0">
        </div>
        @if ($errors->has('rbi'))
        <div class="text-danger">
            {{ $errors->first('rbi') }}
        </div>
        @endif

        <div class="form-group">
            <label for="home_run">本塁打数</label>
            <input type="number" name="home_run" id ="home_run" class="form-control" value="0">
        </div>
        @if ($errors->has('home_run'))
        <div class="text-danger">
            {{ $errors->first('home_run') }}
        </div>
        @endif

        <div class="form-group">
            <label for="base_avg">出塁率</label>
            <input type="number" step="0.001" name="base_avg" id="base_avg" class="form-control" value="{{ $player->base_avg ?? '' }}" readonly>
        </div>
        @if ($errors->has('base_avg'))
        <div class="text-danger">
            {{ $errors->first('base_avg') }}
        </div>
        @endif

        <div class="form-group">
            <label for="long_avg">長打率</label>
            <input type="number" step="0.001" name="long_avg" id="long_avg" class="form-control" value="{{ old('long_avg') }}" readonly>
        </div>
        @if ($errors->has('long_avg'))
        <div class="text-danger">
            {{ $errors->first('long_avg') }}
        </div>
        @endif

        <div class="form-group">
            <label for="game_count">試合数</label>
            <input type="number" name="game_count" class="form-control" value="{{ old('game_count') }}">
        </div>
        @if ($errors->has('game_count'))
        <div class="text-danger">
            {{ $errors->first('game_count') }}
        </div>
        @endif

        <div class="form-group">
            <label for="created_at">作成日時</label>
            <input type="text" name="created_at" class="form-control" value="{{ old('created_at') }}" readonly>
        </div>
        @if ($errors->has('created_at'))
        <div class="text-danger">
            {{ $errors->first('created_at') }}
        </div>
        @endif

        <div class="form-group">
            <label for="updated_at">更新日時</label>
            <input type="text" name="updated_at" class="form-control" value="{{ old('updated_at') }}" readonly>
        </div>
        @if ($errors->has('updated_at'))
        <div class="text-danger">
            {{ $errors->first('updated_at') }}
        </div>
        @endif

        <div class="form-group">
            <label for="ops">OPS</label>
            <input type="number" step="0.001" name="ops" id="ops" class="form-control" value="0" readonly>
        </div>
        @if ($errors->has('ops'))
        <div class="text-danger">
            {{ $errors->first('ops') }}
        </div>
        @endif

        <div class="form-group">
            <label for="walks">四死球</label>
            <input type="number" name="walks" id="walks" class="form-control" value="0">
        </div>
        @if ($errors->has('walks'))
        <div class="text-danger">
            {{ $errors->first('walks') }}
        </div>
        @endif

        <div class="form-group">
            <label for="sacrifice_hits">犠打</label>
            <input type="number" name="sacrifice_hits" id="sacrifice_hits" class="form-control" value="0">
        </div>
        @if ($errors->has('sacrifice_hits'))
        <div class="text-danger">
            {{ $errors->first('sacrifice_hits') }}
        </div>
        @endif

        <div class="form-group">
            <label for="sacrifice_flies">犠飛</label>
            <input type="number" name="sacrifice_flies" id="sacrifice_flies" class="form-control" value="0">
        </div>
        @if ($errors->has('sacrifice_flies'))
        <div class="text-danger">
            {{ $errors->first('sacrifice_flies') }}
        </div>
        @endif

        <div class="form-group">
            <label for="era">防御率（ERA）</label>
            <input type="number" step="0.001" name="era" id="era" class="form-control" value="{{ old('era') }}" readonly>
        </div>
        @if ($errors->has('era'))
        <div class="text-danger">
            {{ $errors->first('era') }}
        </div>
        @endif

        <div class="form-group">
            <label for="wins">勝利数</label>
            <input type="number" name="wins" class="form-control" value="{{ old('wins') }}">
        </div>
        @if ($errors->has('wins'))
        <div class="text-danger">
            {{ $errors->first('wins') }}
        </div>
        @endif

        <div class="form-group">
            <label for="losses">敗北数</label>
            <input type="number" name="losses" class="form-control" value="{{ old('losses') }}">
        </div>
        @if ($errors->has('losses'))
        <div class="text-danger">
            {{ $errors->first('losses') }}
        </div>
        @endif

        <div class="form-group">
            <label for="winning_percentage">勝率</label>
            <input type="number" step="0.001" name="winning_percentage" class="form-control" value="{{ old('winning_percentage') }}">
        </div>
        @if ($errors->has('winning_percentage'))
        <div class="text-danger">
            {{ $errors->first('winning_percentage') }}
        </div>
        @endif

        <div class="form-group">
            <label for="complete_games">完投数</label>
            <input type="number" name="complete_games" class="form-control" value="{{ old('complete_games') }}">
        </div>
        @if ($errors->has('complete_games'))
        <div class="text-danger">
            {{ $errors->first('complete_games') }}
        </div>
        @endif

        <div class="form-group">
            <label for="shutouts">完封数</label>
            <input type="number" name="shutouts" class="form-control" value="{{ old('shutouts') }}">
        </div>
        @if ($errors->has('shutouts'))
        <div class="text-danger">
            {{ $errors->first('shutouts') }}
        </div>
        @endif

        <div class="form-group">
            <label for="hits_allowed">被安打数</label>
            <input type="number" name="hits_allowed" class="form-control" value="{{ old('hits_allowed') }}">
        </div>
        @if ($errors->has('hits_allowed'))
        <div class="text-danger">
            {{ $errors->first('hits_allowed') }}
        </div>
        @endif

        <div class="form-group">
            <label for="home_runs_allowed">被本塁打数</label>
            <input type="number" name="home_runs_allowed" class="form-control" value="{{ old('home_runs_allowed') }}">
        </div>
        @if ($errors->has('home_runs_allowed'))
        <div class="text-danger">
            {{ $errors->first('home_runs_allowed') }}
        </div>
        @endif

        <div class="form-group">
            <label for="strikeouts">奪三振数</label>
            <input type="number" name="strikeouts" class="form-control" value="{{ old('strikeouts') }}">
        </div>
        @if ($errors->has('strikeouts'))
        <div class="text-danger">
            {{ $errors->first('strikeouts') }}
        </div>
        @endif

        <div class="form-group">
            <label for="inning">投球回数（イニング）</label>
            <input type="number" name="inning" id="inning" class="form-control">
        </div>

        <div class="form-group">
            <label for="fraction">投球回数（分数）</label>
            <select name="fraction" id="fraction" class="form-control">
                <option value="0">0</option>
                <option value="1/3">1/3</option>
                <option value="2/3">2/3</option>
            </select>
        </div>

        @if ($errors->has('inning'))
        <div class="text-danger">
            {{ $errors->first('inning') }}
        </div>
        @endif


        <div class="form-group">
            <label for="conceded_points">失点数</label>
            <input type="number" name="conceded_points" id="conceded_points" class="form-control" value="{{ old('conceded_points') }}">
        </div>
        @if ($errors->has('conceded_points'))
        <div class="text-danger">
            {{ $errors->first('conceded_points') }}
        </div>
        @endif

        <div class="form-group">
            <label for="pitched">投球数</label>
            <input type="number" name="pitched" class="form-control" value="{{ old('pitched') }}">
        </div>
        @if ($errors->has('pitched'))
        <div class="text-danger">
            {{ $errors->first('pitched') }}
        </div>
        @endif

        <div class="form-group">
            <label for="image">選手画像</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
    </form>
</div>


<script>
    function checkSubmit() {
        if (window.confirm('登録してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }

    




</script>


@endsection