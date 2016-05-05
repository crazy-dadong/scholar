<?php

namespace App\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Data\Project;
use App\Data\Module;
use App\Data\Task;
use App\Data\User;

class DashboardController extends Controller
{
    public function getIndex(Request $request)
    {
        $user = $request->user();
        $tasks = Task::where('user_id', $user['id'])->get();
        dd($tasks);
//        return view('user.dashboard.index');
    }

}
