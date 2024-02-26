@extends('layouts.admin_layout')
<link rel="stylesheet" href="{{ asset('/css/sidebars.css') }}">
@section('title','試合登録')
@section('content')


<x-alert type="success" :session="session('success')" />
<!-- メインコンテンツ -->
<div class="container">
    <h2>試合情報編集</h2>

    <form method="POST" action="{{ route('admin.game.store') }}" onSubmit="return checkSubmit()">
        @csrf

        <input type="hidden" name="id" value="{{ $game->id }}">
        <div>
            <label for="opponent">対戦相手:</label>
            <input type="text" id="opponent" name="opponent" class="form-control">
        </div>
        <div>
            <label for="side">対戦相手の攻撃:</label>
            <select name="flip" class="form-control">
                <option value="0">表</option>
                <option value="1">裏</option>
            </select>
        </div>
        <div>
            <label for="game_date">対戦日:</label>
            <input type="date" id="game_date" name="game_date" class="form-control">
        </div>
        <div>
            <label for="game_comment">試合コメント:</label>
            <input type="text" id="game_comment" name="game_comment" class="form-control">
        </div>


        <table class="score-table border tabel-edit">
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
                    <td class="no-wrap" id="home-team">ホームチーム</td>
                    <td><input type="number" name="top_first" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_second" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_third" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_fourth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_fifth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_sixth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_seventh" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_eighth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_ninth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_total" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_hit" class="form-control form-control-sm"></td>
                    <td><input type="number" name="top_error" class="form-control form-control-sm"></td>
                </tr>
                <tr>
                    <td class="no-wrap" id="visitor-team">ビジターチーム</td>
                    <td><input type="number" name="bottom_first" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_second" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_third" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_fourth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_fifth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_sixth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_seventh" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_eighth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_ninth" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_total" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_hit" class="form-control form-control-sm"></td>
                    <td><input type="number" name="bottom_error" class="form-control form-control-sm"></td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">登録</button>
        <a href="javascript:history.back()" class="btn btn-primary">戻る</a>
    </form>
</div>



<script>
    function checkSubmit() {
        if (window.confirm('更新してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
    //     const selectElement = document.getElementById('side');
    //   const homeTeamElement = document.getElementById('home-team');
    //   const visitorTeamElement = document.getElementById('visitor-team');
    //   const vsTeam = document.getElementById('opponent').textContent = "{{ $game->opponent }}";

    //   selectElement.addEventListener('change', function() {
    //     if (selectElement.value === '表') {
    //       homeTeamElement.textContent = vsTeam;
    //       visitorTeamElement.textContent = 'BLUE HERTS';
    //     } else if (selectElement.value === '裏') {
    //       homeTeamElement.textContent = 'ホームチーム';
    //       visitorTeamElement.textContent = 'ビジターチーム';
    //     }
    //   });
</script>


@endsection