<?php

namespace App\Http\Controllers\Welcome;

use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends Controller
{
    public function getIndex()
    {
//        echo URL::action('Home\IndexController@getIndex');
//        echo 'ok';
        return view('welcome.index')->with('welcome', 'Hello Word!');
    }

}
