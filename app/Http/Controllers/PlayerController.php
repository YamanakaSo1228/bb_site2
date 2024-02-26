<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\BattingRecord;
use Illuminate\Support\Facades\Session;



class PlayerController extends Controller
{
    /**
     * home画面の表示
     * 
     * @return view
     */
    public function memberList(){

      $players = DB::table('players')
        ->get();

      foreach($players as $player){
        if($player->position == 1){
          $player->position = '監督';
        } elseif(($player->position == 2)) {
          $player->position = 'コーチ';
        } elseif(($player->position == 3)) {
          $player->position = 'マネージャー';
        } elseif(($player->position == 4)) {
          $player->position = '投手';
        } elseif(($player->position == 5)) {
          $player->position = '捕手';
        } elseif(($player->position == 6)) {
          $player->position = '内野手';
        } elseif(($player->position == 7)) {
          $player->position = '外野手';
        }

      }

        return view('visitor.player', compact('players'));
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function memberDetail($id){

      $players = Player::find($id);

      if(empty($players)){
        Session::flash('error', 'データがありません');
        return redirect(route('member'));
      }
      // $players = player::all();

      // dd($players);


        return view('visitor.player_detail', compact('players'));
    }


}
