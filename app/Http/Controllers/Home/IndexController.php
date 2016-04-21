<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex()
    {

//        echo 'ok';
        return view('home.welcome')->with('welcome', 'Hello Word!');
    }
}
