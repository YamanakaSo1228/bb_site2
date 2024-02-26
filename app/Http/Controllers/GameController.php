<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Services\DateFormatterService;
use Carbon\Carbon;

class GameController extends Controller
{

    protected $dateFormatter;

    public function __construct(DateFormatterService $dateFormatter)
    {
        $this->dateFormatter = $dateFormatter;
    }
    //
    public function index(Request $request)
{
    $selectedYear = $request->query('y', date('Y')); // クエリパラメータから年数を取得、デフォルトは現在の年

    // データベースから試合結果を取得
    $games = DB::table('games')
        ->whereYear('game_date', $selectedYear) // 選択された年数でフィルタリング
        ->orderBy('game_date','desc')
        ->get()
        ->map(function ($game) {
            $game->game_date = $this->dateFormatter->formatToJapaneseDate($game->game_date);
            return $game;
        })
        ->toArray();

    return view('visitor.game', compact('games', 'selectedYear'));
}


    public function gamesDetail($id){
        $game = DB::table('games')->find($id);


        if(empty($game)){
            Session::flash('error', '試合データがありません。');
            return redirect(route('game'));
        }

// dd($games);
        return view('visitor.game_detail', compact('game'));
    }
}
