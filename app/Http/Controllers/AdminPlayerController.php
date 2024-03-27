<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BattingRecord;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Services\AdminService;

class AdminPlayerController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPlayer()
{
    //
    $players = Player::orderBy('created_at', 'asc')->paginate(5);

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
    return view('admin.player', compact('players'));
  }

    /**
     * 選手登録画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $player = Player::find(1); // 任意のプレーヤーIDを指定してデータを取得する
        if ($player) {
          return view('admin.player_create', compact('player'));
        } else {
          return view('admin.player_create');
        }
    }

    /**
     * 選手の登録処理を行う
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        // 省略
        $inputs = $request->except('image'); // 画像以外の入力データを取得
        $inputs['inning'] = $this->adminService->calculateTotalInning($inputs['inning'], $inputs['fraction']);

        // 画像アップロード処理
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $inputs['image'] = $imagePath;
        }

        DB::beginTransaction();
        try {
            // 省略
            // 選手の登録
            Player::create($inputs);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error($e);
            dd('失敗');
            abort(500);
        }

        return redirect(route('admin.player'))->with('success', '新規選手を登録しました！');
    }

    /**
     * 選手登録情報詳細を表示
     *
     * @param [type] $id
     * @return void
     */
    public function playerDetail($id)
    {
      //
      $player = DB::table('players')->find($id);
      // dd($player->position);
      $player->position = $this->getPositionLabel($player->position);
      // dd($player->position);
      return view('admin.player_detail', compact('player'));
    }

    /**
     * 選手情報編集画面を表示する
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //
      try {
        // 選手情報を取得
        $player = DB::table('players')->find($id);
    
        // イニングを小数部と整数部に分割
        $inningParts = explode('.', $player->inning);
        $inning = isset($inningParts[0]) ? $inningParts[0] : 0;
        $fraction = isset($inningParts[1]) ? $inningParts[1] : 0;

        // イニングとfractionをplayerオブジェクトに追加
        $player->inning = $inning;
        $player->fraction = $fraction;
    
        // 選手のポジションをラベル化
        $player->position = $this->getPositionLabel($player->position);
    
        return view('admin.player_edit', compact('player'));
      } catch (\Throwable $e) {
        Log::error($e);
        return redirect()->back()->with('error', 'エラーが発生しました。もう一度試してください。');
      }

    }

    /**
     * 選手情報の更新を行う
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request)
    {
      try {
        $inputs = $request->except('image'); // 画像以外の入力データを取得
    
        // プレイヤーの元の情報を取得
        $player = Player::find($inputs['id']);
        $oldImage = $player->image;

        // 画像アップロード処理
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $inputs['image'] = $imagePath;
        } else {
            // 画像がアップロードされなかった場合は、元の画像を再度設定
            $inputs['image'] = $oldImage;
        }
    
        // イニングの計算
        $inputs['inning'] = $this->adminService->calculateTotalInning($inputs['inning'], $inputs['fraction']);
    
        // プレイヤー情報を更新
        $player->fill($inputs);
        $player->save();
    
        return redirect(route('admin.player'))->with('success', '選手の登録内容を更新しました！');
    } catch (\Throwable $e) {
        Log::error($e);
        return redirect()->back()->with('error', 'エラーが発生しました。もう一度試してください。');
    }
    }


    /**
     * 選手登録の削除
     *
     * @param  \App\Models\Player  $player
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
          Player::destroy($id);
        } catch(\Throwable $e) {
          Log::error($e);
          dd('失敗');
          abort(500);
        }
        Player::destroy($id);

        Session::flash('err_msg', '選手を削除しました');
        return redirect(route('admin.player'))->with('danger', '選手を削除しました。');
    }

  private function getPositionLabel($position)
  {
    if ($position == 1) {
      return '監督';
    } elseif ($position == 2) {
      return 'コーチ';
    } elseif ($position == 3) {
      return 'マネージャー';
    } elseif ($position == 4) {
      return '投手';
    } elseif ($position == 5) {
      return '捕手';
    } elseif ($position == 6) {
      return '内野手';
    } elseif ($position == 7) {
      return '外野手';
    } else {
      return '';
    }
  }
}
