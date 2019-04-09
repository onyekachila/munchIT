<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\RestoCategoryValidate;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            'category' => ['required', new RestoCategoryValidate], 
            'price' => 'required|numeric',
            'item' => 'required',
        ]);

        return $postData; 
    }
}
