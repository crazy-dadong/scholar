<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class IndexController extends Controller
{
    /**
     * 后台首页
     *
     * @return mixed
     */
    public function getIndex()
    {

        return view('admin.dashboard.index');
    }
}
