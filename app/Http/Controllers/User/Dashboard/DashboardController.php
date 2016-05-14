<?php

namespace App\Http\Controllers\User\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Data\Project;
use App\Data\Module;
use App\Data\Task;
class DashboardController extends Controller
{
    /**
     * 用户控制台页面
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getIndex(Request $request)
    {
        $user = $request->user();

        if($user->task_id){
            $execTask = Task::find($user->task_id);
        }else{
            $execTask = null;
        }

        $tasks = Task::where('user_id', $user->id)
            ->where('plan_started_at', '>', Carbon::today())
            ->where('plan_started_at', '<', Carbon::tomorrow())
            ->where('status', 0)
            ->orderBy('plan_started_at')
            ->get();


        $projects = Project::where('user_id', $user->id)->get();
        $modules = Module::where('user_id', $user->id)->get();

        // 获取模块下有多少需要执行的任务


        return view('user.dashboard.index', [
            'tasks' => $tasks,
            'execTask' => $execTask,
            'projects' => $projects,
            'modules' => $modules,
        ]);
    }

}
