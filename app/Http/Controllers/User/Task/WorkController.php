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
        // 如果有正在执行的任务
        if($this->user->task_id){
            // !
            if($this->user->task_id != $request->task_id){
                abort(500);
            }
        }else{
            /** 执行新任务 */
            if ($this->user->task_id == 0 || $this->user->task_id == $request->task_id) {
                $this->user->task_id = $request->task_id;
                $this->user->task_begin_at = Carbon::now();
                $this->user->save();
            }
        }

        $task = Task::find($this->user->task_id);

        $model = Module::find($task->module_id);
        $project = Project::find($model->project_id);

        // 任务
        $task->model_name = $model->name;
        $task->project_name = $project->name;
        $task->task_begin_at = $this->user->task_begin_at;

        return view('user.task.work.index', [
            'task' => $task,
        ]);
    }
}
