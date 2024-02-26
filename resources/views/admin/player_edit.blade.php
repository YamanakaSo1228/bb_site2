@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">

@section('title','選手編集')
@section('content')


<x-alert type="success" :session="session('success')" />
<!-- メインコンテンツ -->
<div class="container">
    <h2>選手情報登録</h2>
    <form method="POST" action="{{ route('admin.player.update') }}" onSubmit="return checkSubmit()" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $player->id }}">

        <div class="form-group">
            <label for="position">ポジション</label>
            <select name="position" class="form-control">
                <option value="1" {{ $player->position == '監督' ? 'selected' : '' }}>監督</option>
                <option value="2" {{ $player->position == 'コーチ' ? 'selected' : '' }}>コーチ</option>
                <option value="3" {{ $player->position == 'マネージャー' ? 'selected' : '' }}>マネージャー</option>
                <option value="4" {{ $player->position == '投手' ? 'selected' : '' }}>投手</option>
                <option value="5" {{ $player->position == '捕手' ? 'selected' : '' }}>捕手</option>
                <option value="6" {{ $player->position == '内野手' ? 'selected' : '' }}>内野手</option>
                <option value="7" {{ $player->position == '外野手' ? 'selected' : '' }}>外野手</option>
            </select>
        </div>
        @if ($errors->has('position'))
        <div class="text-danger">
            {{ $errors->first('position') }}
        </div>
        @endif

        <div class="form-group">
            <label for="uniform_number">背番号</label>
            <input type="number" name="uniform_number" class="form-control" value="{{ $player->uniform_number }}">
        </div>
        @if ($errors->has('uniform_number'))
        <div class="text-danger">
            {{ $errors->first('uniform_number') }}
        </div>
        @endif

        <div class="form-group">
            <label for="player_name">選手名</label>
            <input type="text" name="player_name" class="form-control" value="{{ $player->player_name }}">
        </div>
        @if ($errors->has('player_name'))
        <div class="text-danger">
            {{ $errors->first('player_name') }}
        </div>
        @endif

        <div class="form-group">
            <label for="count">打席数</label>
            <input type="number" name="count" id="count" class="form-control" value="{{ $player->count }}">
        </div>
        @if ($errors->has('count'))
        <div class="text-danger">
            {{ $errors->first('count') }}
        </div>
        @endif

        <div class="form-group">
            <label for="hit">安打数</label>
            <input type="number" name="hit" id="hit" class="form-control" value="{{ $player->hit }}">
        </div>
        @if ($errors->has('hit'))
        <div class="text-danger">
            {{ $errors->first('hit') }}
        </div>
        @endif

        <div class="form-group">
            <label for="avg">打率</label>
            <input type="number" step="0.001" name="avg" id="avg" class="form-control" value="{{ $player->avg }}" readonly>
        </div>
        @if ($errors->has('avg'))
        <div class="text-danger">
            {{ $errors->first('avg') }}
        </div>
        @endif

        <div class="form-group">
            <label for="rbi">打点数</label>
            <input type="number" name="rbi" class="form-control" value="{{ $player->rbi }}">
        </div>
        @if ($errors->has('rbi'))
        <div class="text-danger">
            {{ $errors->first('rbi') }}
        </div>
        @endif

        <div class="form-group">
            <label for="home_run">本塁打数</label>
            <input type="number" name="home_run" class="form-control" value="{{ $player->home_run }}">
        </div>
        @if ($errors->has('home_run'))
        <div class="text-danger">
            {{ $errors->first('home_run') }}
        </div>
        @endif

        <div class="form-group">
            <label for="base_avg">出塁率</label>
            <input type="number" step="0.001" name="base_avg" class="form-control" value="{{ $player->base_avg }}">
        </div>
        @if ($errors->has('base_avg'))
        <div class="text-danger">
            {{ $errors->first('base_avg') }}
        </div>
        @endif

        <div class="form-group">
            <label for="long_avg">長打率</label>
            <input type="number" step="0.001" name="long_avg" class="form-control" value="{{ $player->long_avg }}">
        </div>
        @if ($errors->has('long_avg'))
        <div class="text-danger">
            {{ $errors->first('long_avg') }}
        </div>
        @endif

        <div class="form-group">
            <label for="game_count">試合数</label>
            <input type="number" name="game_count" class="form-control" value="{{ $player->game_count }}">
        </div>
        @if ($errors->has('game_count'))
        <div class="text-danger">
            {{ $errors->first('game_count') }}
        </div>
        @endif

        <div class="form-group">
            <label for="inning">投球イニング数</label>
            <input type="number" step="0.1" name="inning" id="inning" class="form-control" value="{{ $player->inning }}">
        </div>
        @if ($errors->has('inning'))
        <div class="text-danger">
            {{ $errors->first('inning') }}
        </div>
        @endif

        <div class="form-group">
            <label for="conceded_points">失点数</label>
            <input type="number" name="conceded_points" id="conceded_points" class="form-control" value="{{ $player->conceded_points }}">
        </div>
        @if ($errors->has('conceded_points'))
        <div class="text-danger">
            {{ $errors->first('conceded_points') }}
        </div>
        @endif

        <div class="form-group">
            <label for="era">防御率</label>
            @if ($player->era !== null)
            <input type="text" name="era" id="era" class="form-control" value="{{ number_format($player->era, 2, '.', '') }}" readonly>
            @else
            <input type="text" name="era" id="era" class="form-control" value="" readonly>
            @endif
        </div>
        @if ($errors->has('era'))
        <div class="text-danger">
            {{ $errors->first('era') }}
        </div>
        @endif


        <div class="form-group">
            <label for="pitched">投球数</label>
            <input type="number" name="pitched" class="form-control" value="{{ $player->pitched }}">
        </div>
        @if ($errors->has('pitched'))
        <div class="text-danger">
            {{ $errors->first('pitched') }}
        </div>
        @endif
        <div class="form-group">
            <label for="image">選手画像</label>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image" accept="image/*">
                <label class="custom-file-label" for="image">ファイルを選択してください</label>
            </div>
        </div>

        <!-- 現在の画像名を表示 -->
        <p id="currentImage">
            @if ($player->image)
            現在の画像: {{ $player->image }}
            @else
            現在の画像はありません。
            @endif
        </p>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
    </form>
</div>

<style>
    /* ファイル選択ボタンを非表示にする */
    .custom-file-input {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }

    /* カスタムデザインのボタン */
    .custom-file-label {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<script>
    function checkSubmit() {
        if (window.confirm('更新してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }

    const imageInput = document.getElementById("image");
    const currentImageParagraph = document.getElementById("currentImage");

    // ページロード時に現在の画像ファイル名を表示（画像がある場合のみ）
    if ("{{ $player->image }}") {
        const currentImageName = "現在の画像: " + "{{ $player->image }}";
        currentImageParagraph.textContent = currentImageName;
    }

    imageInput.addEventListener("change", function() {
        const selectedFileName = imageInput.files[0]?.name || "ファイルを選択してください";
        currentImageParagraph.textContent = "選手画像: " + selectedFileName;
    });

    // 投球回数と失点数のinput要素を取得
    const $inning = $('#inning');
    const $conceded_points = $('#conceded_points');

    // 投球数と失点数の値が変更されたら防御率を計算して表示する
    $inning.add($conceded_points).on('input', function() {
        const inningValue = parseInt($inning.val(), 10);
        const concededPointsValue = parseInt($conceded_points.val(), 10);
        if (isNaN(inningValue) || isNaN(concededPointsValue) || inningValue === 0) {
            // 投球数または失点数が数値でない、または投球回数が0の場合は打率を空にする
            $('#era').val('');
        } else {
            // 投球数と失点数から打率を計算して表示する
            const eraValue = (concededPointsValue * 9 / inningValue).toFixed(3);
            $('#era').val(eraValue);
        }
    });

    // 打席数と安打数のinput要素を取得
    const $count = $('#count');
    const $hit = $('#hit');

    // 打席数と安打数の値が変更されたら打率を計算して表示する
    $count.add($hit).on('input', function() {
        const countValue = parseInt($count.val(), 10);
        const hitValue = parseInt($hit.val(), 10);
        if (isNaN(countValue) || isNaN(hitValue) || countValue === 0) {
            // 打席数または安打数が数値でない、または打席数が0の場合は打率を空にする
            $('#avg').val('');
        } else {
            // 打席数と安打数から打率を計算して表示する
            const avgValue = (hitValue / countValue).toFixed(3);
            $('#avg').val(avgValue);
        }
    });
</script>


@endsection