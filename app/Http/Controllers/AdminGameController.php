<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\GameRequest;
use Illuminate\Support\Facades\Session;






class AdminGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $games = Game::orderBy('game_date', 'desc')->paginate(5);


        return view('admin.game', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // 任意の試合結果IDを指定してデータを取得する
        $game = Game::find(1);
        return view('admin.game_create', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        //
        $inputs = $request->all();
        DB::beginTransaction();
        //☆本来下記はログ出力をした方がいい
        try{
          //選手の登録
          Game::create($inputs);
          DB::commit();
        } catch(\Throwable $e) {
          DB::rollBack();
          Log::error($e);
          dd('失敗');
          abort(500);
        }
        
        return redirect(route('admin.game'))->with('success', '新規試合情報を登録しました！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $game = DB::table('games')->find($id);

        return view('admin.game_detail', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $game = DB::table('games')->find($id);

        return view('admin.game_edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GameRequest $request)
    {
        //
        //選手のデータを受け取る
        $inputs = $request->all();
        DB::beginTransaction();
        //☆本来下記はログ出力をした方がいい
        try {
            // 選手の登録を変更
            $game = Game::find($inputs['id']);
            $game->fill([
                'opponent' => $inputs['opponent'],
                'game_comment' => $inputs['game_comment'],
                'top_first' => $inputs['top_first'],
                'bottom_first' => $inputs['bottom_first'],
                'top_second' => $inputs['top_second'],
                'bottom_second' => $inputs['bottom_second'],
                'top_third' => $inputs['top_third'],
                'bottom_third' => $inputs['bottom_third'],
                'top_fourth' => $inputs['top_fourth'],
                'bottom_fourth' => $inputs['bottom_fourth'],
                'top_fifth' => $inputs['top_fifth'],
                'bottom_fifth' => $inputs['bottom_fifth'],
                'top_sixth' => $inputs['top_sixth'],
                'bottom_sixth' => $inputs['bottom_sixth'],
                'top_seventh' => $inputs['top_seventh'],
                'bottom_seventh' => $inputs['bottom_seventh'],
                'top_eighth' => $inputs['top_eighth'],
                'bottom_eighth' => $inputs['bottom_eighth'],
                'top_ninth' => $inputs['top_ninth'],
                'bottom_ninth' => $inputs['bottom_ninth'],
                'bottom_error' => $inputs['bottom_error'],
                'bottom_hit' => $inputs['bottom_hit'],
                'bottom_total' => $inputs['bottom_total'],
                'top_error' => $inputs['top_error'],
                'top_hit' => $inputs['top_hit'],
                'top_total' => $inputs['top_total'],
                'game_date' => $inputs['game_date'],
                'flip' => $inputs['flip'],
            ]);
            $game->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error($e);
            dd('失敗');
            abort(500);
        }

        return redirect(route('admin.game'))->with('success', '選手の登録内容を更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        if (empty($id)) {
          Session::flash('err_msg', 'データがありません');
          return redirect(route('admin.player'))->with('danger', 'データがありません！');
        }

        try{
          //　選手の登録を削除
          Game::destroy($id);
        } catch(\Throwable $e) {
          Log::error($e);
          dd('失敗');
          abort(500);
        }
        Game::destroy($id);

        Session::flash('err_msg', '試合内容を削除しました');
        return redirect(route('admin.game'))->with('danger', '試合内容を削除しました。');
    }
}
