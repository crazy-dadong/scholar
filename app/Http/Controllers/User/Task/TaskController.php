<?php

namespace App\Http\Controllers\User\Task;

use App\Data\Module;
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

    public function getCreate()
    {
        // 获取模块列表
        $modules = Module::where('user_id',$this->user->id)->get();
        $defaultModuleId = $this->user->default_module_id;

        return view('user.task.task.create', [
            'modules' => $modules,
            'defaultModuleId' => $defaultModuleId,
        ]);
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
     * @return string
     */
    public function postUpdate(Request $request)
    {
        return 'ok';
    }

    /**
     * 创建快速任务
     *
     * @param Request $request
     */
    public function postFastCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tasks|max:255',
        ]);

        $taskName = $request->input('name');

        $task = new Task();
        $task->name = $taskName;
        $task->user_id = $this->user->id;
        $task->module_id = $this->user->default_module_id;
        $task->plan_started_at = Carbon::now();
        if (!$task->save()) {
            abort(500);
        }
    }

    /**
     * 创建任务
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $this->user->id;
        $task = new Task();
        $task->create($data);

        return redirect()->action('User\Dashboard\DashboardController@getIndex');
    }

}
