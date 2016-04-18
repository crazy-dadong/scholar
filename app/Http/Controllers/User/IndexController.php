<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class IndexController extends Controller
{
    public function getIndex(Request $request)
    {
        $this->middleware('auth');
        $user = $request->user();
        echo $user['name'].'登录成功！';

        echo URL::action('User\IndexController@getIndex');
    }
}
