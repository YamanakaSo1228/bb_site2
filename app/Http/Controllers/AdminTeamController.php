<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\TeamRequest;
use Illuminate\Support\Facades\Session;

class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::all();

        return view('admin.team', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $team = DB::table('teams')->find($id);

        return view('admin.team_edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request)
    {
        //
        //
        //お知らせ内容を受け取る
        $inputs = $request->all();
        DB::beginTransaction();
        //☆本来下記はログ出力をした方がいい
        try{
          // お知らせ登録内容の変更
          $team = Team::find($inputs['id']);
          $team->fill([
            'team_title' => $inputs['team_title'],
            'team_text' => $inputs['team_text'],
          ]);
          $team->save();
          DB::commit();
        } catch(\Throwable $e) {
          DB::rollBack();
          Log::error($e);
          dd('失敗');
          abort(500);
        }

        return redirect(route('admin.team'))->with('success', 'チーム紹介情報を更新しました！');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
