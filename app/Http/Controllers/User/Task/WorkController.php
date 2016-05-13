<?php

namespace App\Http\Controllers\User\Task;

use App\Data\Module;
use App\Data\Project;
use App\Data\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\User\Controller;

class WorkController extends Controller
{
    /**
     * 工作执行界面
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        $user = $this->user;
        // 判断是否执行新的任务
        if (isset($request->task_id)) {

            /** 执行新任务 */
            if ($user->task_id == 0 || $user->task_id == $request->task_id) {
                $user->task_id = $request->task_id;
                $user->task_begin_at = Carbon::now();
                $user->save();


            } elseif ($user->task_id != $request->task_id) {
                /** 当前提交的任务与正在执行的任务不匹配 警告 */
                abort(505);
            }
        } else {

        }

        $task = Task::find($user->task_id);

        $model = Module::find($task->module_id);
        $project = Project::find($model->project_id);

        // 合并 任务
        $task->model_name = $model->name;
        $task->project_name = $project->name;
        $task->task_begin_at = $user->task_begin_at;



        return view('user.task.work.index', [
            'task' => $task,
        ]);
    }
}
