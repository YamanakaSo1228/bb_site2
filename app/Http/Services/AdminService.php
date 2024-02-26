<?php

namespace App\Http\Services;
use App\Models\Admin;


class AdminService
{
    // サービスのメソッドやビジネスロジックをここに実装する
    /**
     * emailがマッチしたユーザーを返す
     *
     * @param string $email
     * @return void
     */
    public function getAdminByEmail($email){
      return Admin::where('email', '=', $email)->get()->first();
    }

    /**
     * アカウントがロックされているか
     * @param object $admin
     * @return bool
     */
    public function isAccountLocked($admin)
    {
      if ($admin->locked_flg === 1) {
        return true;
      }
      return false;
    }

    /**
     * エラーカウントをリセットする
     * @param object $admin
     * 
     */
    public function resetErrorCount($admin)
    {
      if($admin->error_count > 0) {
        $admin->error_count = 0;
        $admin->save();
      }
    }

    /**
     * エラーカウントを１増やす
     * @param int $error_count
     * @return int 
     */
    public function addErrorCount(int $error_count)
    {
      return $error_count + 1;
    }

    /**
     * アカウントをロックする
     * @param object $admin
     * @return false
     */
    public function lockAccount($admin)
    {
    if($admin->error_count > 5) {
        $admin->locked_flg = 1;
        $admin->save();
    }
    return false;
    }

    /**
     * ポジションステータスの判定(一旦保留)
     */
    public function positionStatus($position)
    {
      if($position == 1){
        $position = '監督';
      } elseif($position == 2) {
        $position = 'コーチ';
      } elseif($position == 3) {
        $position = 'マネージャー';
      } elseif($position == 4) {
        $position = '投手';
      } elseif($position == 5) {
        $position = '捕手';
      } elseif($position == 6) {
        $position = '内野手';
      } elseif($position == 7) {
        $position = '外野手';
      }
    }
}