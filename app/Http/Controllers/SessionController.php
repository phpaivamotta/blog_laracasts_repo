<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User as ModelsUser;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // logs the user out and redirects to homepage w/ goodbye message
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Tchau Tchau :(');
    }

    // directs user to login page
    public function create()
    {
        return view('sessions.create');
    }

    // logs user in 
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Ebaa! Bem-vindo(a) de volta :D');
        }

        throw ValidationException::withMessages([
            'email' => 'Suas credencias não puderam ser validadas.'
        ]);
    }

    // my solution
    // public function login()
    // {
    //     $attributes = request()->validate([
    //         'username' => ['required', 'min:3', 'max:255'],
    //         'password' => ['required', 'min:7', 'max:255']
    //     ]);

    //     $user = User::where('username', '=', $attributes['username'])
    //                 ->where('password', '=', $attributes['password'])
    //                 ->first();

    //     if($user){
    //         auth()->login($user);
    //         return redirect('/')->with('success', 'Welcome back, ' . $user->name);
    //     } else {
    //         return redirect('/login')->with('success', 'Sorry.');
    //     }
    // }
}
