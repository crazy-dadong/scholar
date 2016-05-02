<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function getIndex(Request $request)
    {
//        $user = auth()->user();
//        dd($user['name']);
//        return view('tas')->with('welcome', 'Hello Word!');
        return view('user.dashboard.index');
    }
}
