<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMail;
use App\Http\Controllers\InquiryController;


class ReplyController extends Controller
{
    /**
     * 選択されたお問い合わせの返信内容記載画面
     *
     * @param [type] $id
     * @return void
     */
    public function index($id)
    {
        $inquiry = Inquiry::find($id);
        return view('admin.reply', compact('inquiry'));

    }

    /**
     * お問い合わせの返信処理
     *
     * @param Request $request
     * @param [type] $inquiry
     * @return void
     */
    public function store(Request $request, $inquiry)
    {
        $inquiry = Inquiry::findOrFail($inquiry);

        // メール送信
        Mail::to($inquiry->email)->send(new ReplyMail($inquiry, $request->input('body')));

        // 返信内容の保存処理
        $reply = new Reply();
        $reply->inquiry_id = $inquiry->id;
        $reply->email = $inquiry->email; // お問い合わせのメールアドレスをセット
        $reply->body = $request->input('body');
        $reply->save();


        // 返信内容の保存処理などを行う場合はここに記述してください
        // $request->input('email') でメールアドレス、$request->input('body') で本文を取得できます

        // リダイレクト先などの処理を行う場合は、適宜修正してください
        return redirect()->route('admin.inquiry', ['inquiry' => $inquiry->id])->with('success', '返信が送信されました！');
    }
}
