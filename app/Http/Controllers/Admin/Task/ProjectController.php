<?php

namespace App\Http\Controllers\Admin\Task;

use App\Data\Module;
use App\Data\Project;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function getIndex()
    {

        $projects = Project::with(['user'])->paginate(15);

        $projects_id = $projects->pluck('id')->toArray();
        $countModuleByModule = Module::whereIn('project_id', $projects_id)->groupBy('project_id')->get([DB::raw('COUNT(id) as count'), 'project_id']);

        $projects->transform(function ($item, $key) use ($countModuleByModule) {

            $item->moduleCount = $countModuleByModule->where('project_id', $item->id)->first()->count;
            return $item;
        });

        return view('admin.task.project', [
            'projects' => $projects,
        ]);
    }
}
