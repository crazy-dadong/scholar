<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class IndexController extends Controller
{

    // 用户控制台
    public function getIndex()
    {
        return "hello Word";
    }
}
