<?php

namespace App\Http\Controllers\User\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Data\Project;
use App\Data\Module;
use App\Data\Task;
use App\Data\User;

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

        $tasks = Task::where('user_id', $user['id'])
            ->where('plan_started_at', '>', Carbon::today())
            ->where('plan_started_at', '<', Carbon::tomorrow())
            ->where('status', 0)
            ->orderBy('plan_started_at')
            ->paginate(15);

        return view('user.dashboard.index', [
            'tasks' => $tasks,
            'execTask' => $execTask,
        ]);
    }

}
