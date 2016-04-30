<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use URL;

class IndexController extends Controller
{
    public function getIndex()
    {
        echo URL::action('Home\IndexController@getIndex');
//        echo 'ok';
//        return view('home.welcome')->with('welcome', 'Hello Word!');
    }

}
