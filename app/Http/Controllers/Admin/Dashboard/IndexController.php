<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Data\Module;
use App\Data\Project;
use App\Data\Task;
use App\Data\User;
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

        $userCount = User::count();
        $projectCount = Project::count();
        $moduleCount = Module::count();
        $taskCount = Task::count();
        return view('admin.dashboard.index', [
            'userCount' => $userCount,
            'projectCount' => $projectCount,
            'moduleCount' => $moduleCount,
            'taskCount' => $taskCount,
        ]);
    }
}
