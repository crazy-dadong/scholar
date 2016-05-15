<?php

namespace App\Http\Controllers\Admin\User;

use App\Data\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class IndexController extends Controller
{

    // 用户控制台
    public function getIndex()
    {
        $users = User::paginate(15);
        return view('admin.user.index',[
            'users' => $users,
        ]);
    }

    // 设置管理员
    public function postUserAdmin(Request $request)
    {
        $usersId = $request->input('users_id');
        User::whereIn('id', $usersId)
            ->update(['is_admin' => 1]);

    }
    // 设置普通用户
    public function postUserNormal(Request $request)
    {
        $usersId = $request->input('users_id');
        User::whereIn('id', $usersId)
            ->update(['is_admin' => 0]);

    }

    // 设置 禁用用户
    public function postUserBan(Request $request)
    {
        $usersId = $request->input('users_id');
        User::whereIn('id', $usersId)
            ->update(['is_admin' => 0]);

    }
}
