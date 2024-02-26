<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class TeamController extends Controller
{
    public function index(){

    $team = DB::table('teams')
    ->get()
    ->toArray();
    
    //チーム紹介ページを表示
    return view('visitor.team', compact('team'));
    }
}
