<?php

namespace App\Http\Controllers\User\Task;

use App\Data\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\User\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * 任务 完成
     */
    public function getFinish()
    {

        $user = Auth::user();
        $execTask = Task::find($user->task_id);
        $execTask->actually_started_at = $user->task_begin_at;
        $execTask->actually_end_at = Carbon::now();
        $execTask->status = 1;
        $execTask->save();

        $user->task_id = 0;
        $user->task_begin_at = null;
        $user->save();
    }

    /**
     * 任务取消
     */
    public function getCancel()
    {
    }

    /**
     * 任务修改
     * @param Request $request
     */
    public function postUpdate(Request $request)
    {

    }

    public function postFastCreate(Request $request)
    {

    }

}
