<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginFromRequest;
use App\Models\Admin;
use App\Http\Services\AdminService;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    private $admin;

    public function __construct(AdminService $admin)
    {
        $this->admin = $admin;
    }
    /**
     * ログイン画面表示
     *
     * @return void
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * ログイン処理
     *
     * @param LoginFromRequest $request
     * @return void
     */
    public function login(LoginFromRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //アカウントがロックされていたら弾く
        $admin = $this->admin->getAdminByEmail($credentials['email']);

        if(!is_null($admin)) {
            if($this->admin->isAccountLocked($admin)) {
                return back()->withErrors([
                    'danger' => 'アカウントがロックされています。',
                ]);
            }
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $this->admin->resetErrorCount($admin);
                return redirect()->route('admin.home')->with('success', 'ログイン成功しました！');
            }

            //ログイン失敗したらエラーカウントを１増やす（赤波線が出ているが動作は正常なので、一旦無視）
            $admin->error_count = $this->admin->addErrorCount($admin->error_count);

            //エラーカウントが６以上の場合はアカウントをロックする。
            if($this->admin->lockAccount($admin)) {

                return back()->withErrors([
                    'danger' => 'アカウントがロックされました。',
                ]);
            }
            $admin->save();

        }


        return back()->withErrors([
            'danger' => 'メールアドレスまたはパスワードが間違っています。',
        ]);

        return $request;
    }

    /**
     * ログアウト処理
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
// dd(redirect()->route('admin.login')->with('logout', 'ログアウト成功しました！'));
        return redirect()->route('admin.login')->with('danger', 'ログアウト成功しました！');
    }

    public function adminHome()
    {
        $admin = Auth::user();

       
        $adminInfo = DB::table('admins')
        ->where('id', $admin->id)
        ->first();

        return view('admin.home')->with('adminInfo', $adminInfo);
    }
}
