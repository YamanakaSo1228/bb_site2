<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inquiry;
use App\Models\Reply;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\InquiryRequest;
use Illuminate\Support\Facades\Session;
use App\Mail\InquirySendmail;
use Illuminate\Support\Facades\Mail;

class AdminInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inquiries = DB::table('inquiries')
            ->orderBy('created_at', 'desc') // 'desc'を追加して降順でソート
            ->get()
            ->toArray();
        $inquiries = Inquiry::orderBy('created_at', 'desc') // Eloquentモデルを使った降順ソート
            ->paginate(8); // paginateを使って8件ずつ表示

        return view('admin.inquiry', compact('inquiries'));
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
     * お問い合わせ詳細画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $inquiry = DB::table('inquiries')->find($id);


        $replies = Reply::where('inquiry_id', $inquiry->id)->get();

        // dd($replies);


        return view('admin.inquiry_detail', compact('inquiry', 'replies'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
