<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class GeneralSettingController extends Controller
{
    public function index()
    {
        return view('app.settings.index');
    }
}
