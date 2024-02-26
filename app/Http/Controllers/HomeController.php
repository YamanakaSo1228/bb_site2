<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Services\DateFormatterService;


class HomeController extends Controller
{

    protected $dateFormatter;

    public function __construct(DateFormatterService $dateFormatter)
    {
        $this->dateFormatter = $dateFormatter;
    }
    /**
     * home画面の表示
     * 
     * @return view
     */
    public function index(){

        $games = DB::table('games')
        ->orderBy('game_date', 'desc')
        ->limit(3)
        ->get()
        ->map(function ($game) {
            $game->game_date = $this->dateFormatter->formatToJapaneseDate($game->game_date);
            return $game;
        })
        ->toArray();

        // dd($games);

        $notices = DB::table('notices')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
        // dd($notices);

        return view('visitor.home', compact('games', 'notices'));
    }
}
