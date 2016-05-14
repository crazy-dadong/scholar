<?php

namespace App\Http\Controllers\User\Task;

use App\Data\Module;
use App\Data\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\User\Controller;

class ModelController extends Controller
{
    /**
     * 设置默认模块
     * @param Request $request
     */
    public function postDefault(Request $request)
    {
        dd("hello word");
    }

    /**
     * 创建新模块
     */
    public function postCreate(Request $request)
    {
        $module = new Module;

        $module->user_id = $this->user->id;
        $module->project_id = $request->input('project_id');
        $module->name = $request->input('name');

        if(!$module->save()){
            abort(503);
        }


    }
}
