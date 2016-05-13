<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');

        $this->user = Auth::user();
    }
}
