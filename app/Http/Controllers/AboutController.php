<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        return view('about.show', [
            'user' => User::first()
        ]);
    }
}
