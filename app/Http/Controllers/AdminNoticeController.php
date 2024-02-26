<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notice;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\NoticeRequest;
use Illuminate\Support\Facades\Session;


class AdminNoticeController extends Controller
{
    /**
     * お知らせ一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notices = DB::table('notices')
            ->orderBy('created_at')
            ->get()
            ->toArray();
        $notices = Notice::Paginate(5);

        return view('admin.notice', compact('notices'));
    }

    /**
     * お知らせ情報登録画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $notice = Notice::find(1);
        return view('admin.notice_create', compact('notice'));
    }

    /**
     * お知らせ内容の新規登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        //
        $inputs = $request->all();
        DB::beginTransaction();
        //☆本来下記はログ出力をした方がいい
        try{
          //選手の登録
          Notice::create($inputs);
          DB::commit();
        } catch(\Throwable $e) {
          DB::rollBack();
          Log::error($e);
          dd('失敗');
          abort(500);
        }

        return redirect(route('admin.notice'))->with('success', '新規お知らせ情報を登録しました！');
    }

    /**
     * お知らせ詳細画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $notice = DB::table('notices')->find($id);

        return view('admin.notice_detail', compact('notice'));
    }

    /**
     * お知らせ登録編集画面表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $notice = DB::table('notices')->find($id);

        return view('admin.notice_edit', compact('notice'));
    }

    /**
     * お知らせの編集更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request)
    {
        //
        //お知らせ内容を受け取る
        $inputs = $request->all();
        DB::beginTransaction();
        //☆本来下記はログ出力をした方がいい
        try{
          // お知らせ登録内容の変更
          $notice = Notice::find($inputs['id']);
          $notice->fill([
            'notice_title' => $inputs['notice_title'],
            'notice_text' => $inputs['notice_text'],
          ]);
          $notice->save();
          DB::commit();
        } catch(\Throwable $e) {
          DB::rollBack();
          Log::error($e);
          dd('失敗');
          abort(500);
        }

        return redirect(route('admin.notice'))->with('success', 'お知らせ情報を更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        if (empty($id)) {
            Session::flash('err_msg', 'データがありません');
            return redirect(route('admin.notice'))->with('danger', 'データがありません！');
          }
  
          try{
            //　選手の登録を削除
            Notice::destroy($id);
          } catch(\Throwable $e) {
            Log::error($e);
            dd('失敗');
            abort(500);
          }
          Notice::destroy($id);
  
          return redirect(route('admin.notice'))->with('danger', 'お知らせを削除しました。');
    }
}
