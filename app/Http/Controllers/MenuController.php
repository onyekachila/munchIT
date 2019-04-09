<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request)
    {
        return $request->all(); 
    }
}
