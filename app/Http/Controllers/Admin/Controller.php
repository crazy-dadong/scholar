<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth.admin');

        $this->user = Auth::user();
    }
}
