<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class popupRedirect extends Controller
{
    public function index()
    {
        return redirect('/')->with('error_code', 5);
    }
}
