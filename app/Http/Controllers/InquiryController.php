<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\InquiryRequest;
use Illuminate\Support\Facades\Session;
use App\Mail\InquirySendmail;
use Illuminate\Support\Facades\Mail;



class InquiryController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        //お問い合わせ入力ページ表示
        return view('visitor.inquiry');
    }

    /**
     * Undocumented function
     *
     * @param InquiryRequest $request
     * @return void
     */
    public function confirm(InquiryRequest $request){

        // バリデーションルールを定義
        // 引っかかるとエラーを起こしてくれる

        // フォームからの入力値を全て取得a
        $inputs = $request->all();

        Inquiry::create($inputs);

        // 確認ページに表示
        // 入力値を引数に渡す
        return view('visitor.inquiry_confirm', [
        'inputs' => $inputs,
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function send(InquiryRequest $request)
    {

    // actionの値を取得
    $action = $request->input('action');

    // action以外のinputの値を取得
    $inputs = $request->except('action');

    //actionの値で分岐
    if($action !== 'submit') {

        // 戻るボタンの場合リダイレクト処理
        return redirect()
        ->route('inquiry.index')
        ->withInput($inputs);

    } else {
        // 送信ボタンの場合、送信処理

        // ユーザにメールを送信
        Mail::to($inputs['email'])->send(new InquirySendmail($inputs));
        // 自分にメールを送信
        Mail::to('so.baseball1@gmail.com')->send(new InquirySendmail($inputs));

        // 二重送信対策のためトークンを再発行
        $request->session()->regenerateToken();

        // 送信完了ページのviewを表示
        return view('visitor.inquiry_thanks')->with('success','お問い合わせ完了いたしました。送信した内容は受信メールにてご確認ください。');

    }
    }
}
