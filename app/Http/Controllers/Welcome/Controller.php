<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller as BaseController;


class Controller extends BaseController
{
    public function __construct()
    {

        $this->middleware('auth.welcome');
    }
}
