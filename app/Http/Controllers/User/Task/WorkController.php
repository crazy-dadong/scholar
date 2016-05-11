<?php

namespace App\Http\Controllers\User\Task;

use App\Data\Module;
use App\Data\Project;
use App\Data\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    /**
     * 工作执行界面
     *
     * @param Request $request
     */
    public function getIndex(Request $request)
    {
        // 判断是否执行新的任务
        if (isset($request->task_id)) {

            $user = $request->user();
            /** 执行新任务 */
            if ($user->task_id == 0) {
                $user->task_id = $request->task_id;
                $user->task_begin_at = Carbon::now();
                $user->save();


            }elseif ($user->task_id != $request->task_id){
                /** 当前提交的任务与正在执行的任务不匹配 警告 */
                abort(505);
            }
        }

        $task = Task::find($request->task_id);

        $model = Module::find($task->module_id);
        $project = Project::find($model->project_id);

        $task->model_name = $model->name;
        $task->project_name = $project->name;

        return view('user.task.work.index', [
            'task' => $task,
        ]);
    }
}
