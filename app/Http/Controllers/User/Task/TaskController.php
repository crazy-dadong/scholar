<?php

namespace App\Http\Controllers\User\Task;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    /**
     * 任务 完成
     */
    public function getFinish()
    {

        echo "ok";
    }

    /**
     * 任务取消
     * @param Request $request
     */
    public function getCancel(Request $request)
    {

    }

    /**
     * 任务修改
     * @param Request $request
     */
    public function postUpdate(Request $request)
    {

    }


}
