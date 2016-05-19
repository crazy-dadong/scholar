<?php

namespace App\Http\Controllers\Admin\Task;

use App\Data\Module;
use App\Data\Task;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    public function getIndex()
    {
        //$modules = Module::groupBy('project_id')->get([DB::raw('COUNT(id) as totalsales')]);
        $modules = Module::with(['user', 'project'])->paginate(15);

        $modules_id = $modules->pluck('id')->toArray();

        $countTaskByModule = Task::whereIn('module_id', $modules_id)->groupBy('module_id')->get([DB::raw('COUNT(id) as count'), 'module_id']);

        $modules->transform(function ($item, $key) use ($countTaskByModule) {

            $item->taskCount = $countTaskByModule->where('module_id', $item->id)->first()->count;
            return $item;
        });

        return view('admin.task.module', [
            'modules' => $modules,
        ]);
    }
}
