<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\AdminNoticeController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\AdminInquiryController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\PrivacyController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//訪問者側・ホーム画面を表示
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

//選手情報表示
Route::get('/member', 'App\Http\Controllers\PlayerController@memberList')->name('member');

Route::get('/member/{id}', 'App\Http\Controllers\PlayerController@memberDetail')->name('detail');

//お問い合わせ表示
// Route::get('/inquiry', 'App\Http\Controllers\InquiryController@create')->name('inquiry.create');
// Route::post('/inquiry', 'App\Http\Controllers\InquiryController@store')->name('inquiry.store');
// // Route::get('/inquiry', 'InquiryController@create')->name('inquiry.create');
// // Route::post('/inquiry', 'InquiryController@store')->name('inquiry.store');

//入力フォームページ
Route::get('/inquiry', 'App\Http\Controllers\InquiryController@index')->name('inquiry.index');
//確認フォームページ
Route::post('/inquiry/confirm', 'App\Http\Controllers\InquiryController@confirm')->name('inquiry.confirm');
//送信完了ページ
Route::post('/inquiry/thanks', 'App\Http\Controllers\InquiryController@send')->name('inquiry.send');
//プライバシーポリシページ
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');


//入力フォームページ
Route::get('/contact', 'ContactsController@index')->name('contact.index');
//確認フォームページ
Route::post('/contact/confirm', 'ContactsController@confirm')->name('contact.confirm');
//送信完了ページ
Route::post('/contact/thanks', 'ContactsController@send')->name('contact.send');

//試合結果を表示
Route::get('/game', 'App\Http\Controllers\GameController@index')->name('game');
Route::get('/game/{year?}', 'App\Http\Controllers\GameController@index')->name('game');
//試合結果の詳細を表示
Route::get('/game/{id}', 'App\Http\Controllers\GameController@gamesDetail')->name('game.detail');

//チーム紹介ページの表示
Route::get('/team', 'App\Http\Controllers\TeamController@index')->name('team');

//お知らせ詳細ページ
Route::get('/notice/{id}', 'App\Http\Controllers\NoticeController@show')->name('notice');

//管理者ログイン実装
Route::middleware(['guest', 'admin'])->group(function () {
  //ログインフォーム表示
  Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
  //ログイン処理
  Route::post('login', [AdminController::class, 'login'])->name('login');
});

Route::middleware(['auth', 'admin'])->group(function () {
  //ログイン関連
  Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
  Route::post('logout', [AdminController::class, 'logout'])->name('logout');

  //選手情報一覧
  Route::get('/admin/player', [AdminPlayerController::class, 'adminPlayer'])->name('admin.player');
  Route::get('/admin/player/create', [AdminPlayerController::class, 'create'])->name('admin.player.create');
  Route::post('/admin/player/store', [AdminPlayerController::class, 'store'])->name('admin.player.store');
  Route::get('/admin/player/{id}', [AdminPlayerController::class, 'playerDetail'])->name('admin.player.detail');
  Route::get('/admin/player/edit/{id}', [AdminPlayerController::class, 'edit'])->name('admin.player.edit');
  Route::post('/admin/player/update', [AdminPlayerController::class, 'update'])->name('admin.player.update');
  Route::post('/admin/player/delete/{id}', [AdminPlayerController::class, 'delete'])->name('admin.player.delete');

  //試合結果情報一覧
  Route::get('/admin/game', [AdminGameController::class, 'index'])->name('admin.game');
  Route::get('/admin/game/create', [AdminGameController::class, 'create'])->name('admin.game.create');
  Route::post('/admin/game/store', [AdminGameController::class, 'store'])->name('admin.game.store');
  Route::get('/admin/game/{id}', [AdminGameController::class, 'show'])->name('admin.game.detail');
  Route::get('/admin/game/edit/{id}', [AdminGameController::class, 'edit'])->name('admin.game.edit');
  Route::post('/admin/game/update', [AdminGameController::class, 'update'])->name('admin.game.update');
  Route::post('/admin/game/delete/{id}', [AdminGameController::class, 'delete'])->name('admin.game.delete');

  // お知らせ情報一覧・管理機能実装
  Route::get('/admin/notice', [AdminNoticeController::class, 'index'])->name('admin.notice');
  Route::get('/admin/notice/create', [AdminNoticeController::class, 'create'])->name('admin.notice.create');
  Route::post('/admin/notice/store', [AdminNoticeController::class, 'store'])->name('admin.notice.store');
  Route::get('/admin/notice/{id}', [AdminNoticeController::class, 'show'])->name('admin.notice.detail');
  Route::get('/admin/notice/edit/{id}', [AdminNoticeController::class, 'edit'])->name('admin.notice.edit');
  Route::post('/admin/notice/update', [AdminNoticeController::class, 'update'])->name('admin.notice.update');
  Route::post('/admin/notice/delete/{id}', [AdminNoticeController::class, 'delete'])->name('admin.notice.delete');

  // チーム紹介文の表示と編集
  Route::get('/admin/team', [AdminTeamController::class, 'index'])->name('admin.team');
  Route::get('/admin/team/{id}', [AdminTeamController::class, 'show'])->name('admin.team.detail');
  Route::get('/admin/team/edit/{id}', [AdminTeamController::class, 'edit'])->name('admin.team.edit');
  Route::post('/admin/team/update', [AdminTeamController::class, 'update'])->name('admin.team.update');

  //お問い合わせ一覧表示
  // お知らせ情報一覧・管理機能実装
  Route::get('/admin/inquiry', [AdminInquiryController::class, 'index'])->name('admin.inquiry');
  Route::get('/admin/inquiry/create', [AdminInquiryController::class, 'create'])->name('admin.inquiry.create');
  Route::post('/admin/inquiry/store', [AdminInquiryController::class, 'store'])->name('admin.inquiry.store');
  Route::get('/admin/inquiry/{id}', [AdminInquiryController::class, 'show'])->name('admin.inquiry.detail');
  Route::get('/admin/inquiry/edit/{id}', [AdminInquiryController::class, 'edit'])->name('admin.inquiry.edit');
  Route::post('/admin/inquiry/update', [AdminInquiryController::class, 'update'])->name('admin.inquiry.update');
  Route::post('/admin/inquiry/delete/{id}', [AdminInquiryController::class, 'delete'])->name('admin.inquiry.delete');

  //お問い合わせ返信
  Route::post('admin/inquiries/{inquiry}/replies', [ReplyController::class, 'store'])->name('admin.replies.store');
  Route::get('/admin/inquiries/{inquiry}/replies', [ReplyController::class, 'index'])->name('admin.replies.index');
  
});
// //ログインフォーム表示
// Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin');
// //ログイン処理
// Route::post('login', [AdminController::class, 'login'])->name('admin.login');
// //ログイン後の管理者ホーム画面
// Route::get('/admin/home', [AdminController::class, 'adminHome'])->name('admin.home');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
