<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('reset-password', ['request' => $request]);
    }

    public function store()
    {
        
    }
}
