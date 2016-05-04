<?php

namespace App\Http\Controllers\Welcome;

use Illuminate\Http\Request;
use App\Http\Requests;

use Carbon\Carbon;
use App\Data\User;
use App\Data\Task;

class IndexController extends Controller
{
    public function getIndex()
    {
        $subDay = Carbon::now()->subDay();
        $userCount = User::count();
        $userNew = User::where('created_at', '>', $subDay)->count();
        $taskCount = Task::count();
        $taskNew = Task::where('created_at', '>', $subDay)->count();

        return view('welcome.index', [
            'userCount' => $userCount,
            'userNew' => $userNew,
            'taskCount' => $taskCount,
            'taskNew' => $taskNew
        ]);
    }

}
