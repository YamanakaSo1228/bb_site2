<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    //
    public function index()
    {
        // プライバシーポリシーのビューを表示する処理を追加
        return view('visitor.privacy');
    }
}
