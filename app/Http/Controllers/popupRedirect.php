<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class popupRedirect extends Controller
{
    public function loginIndex()
    {
        return redirect('/')->with('error_code', 5);
    }

    public function registerIndex()
    {
        return redirect('/')->with('error_code', 6);
    }
}
