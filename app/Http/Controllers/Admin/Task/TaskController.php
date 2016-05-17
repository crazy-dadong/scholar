<?php

namespace App\Http\Controllers\Admin\Task;

use App\Data\Module;
use App\Data\Project;
use App\Data\Task;
use App\Data\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class TaskController extends Controller
{
    /**
     * 任务管理
     */
    public function getIndex()
    {
        $tasks = Task::paginate(15);
        $users_id = $tasks->unique('user_id')->pluck('user_id')->toArray();
        $modules_id = $tasks->unique('module_id')->pluck('module_id')->toArray();

        $users = User::find($users_id);
        $modules = Module::find($modules_id);

        $project_id = $modules->unique('project_id')->pluck('project_id')->toArray();
        $projects = Project::find($project_id);

        $tasks->transform(function ($item, $key) use ($users, $modules, $projects) {
            $item->user_name = $users->find($item->user_id)->name;
            $item->module_name = $modules->find($item->module_id)->name;
            $item->project_id = $modules->find($item->module_id)->project_id;
            $item->project_name = $projects->find($item->project_id)->name;
            return $item;
        });


        return view('admin.task.task', [
            'tasks' => $tasks,
        ]);

    }
}
