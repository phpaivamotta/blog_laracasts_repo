<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    // return view where user can be registered
    public function create()
    {
        return view('register.create');
    }

    // return view where user can login 
    public function login()
    {
        return view('register.login');
    }

    // store user info in database
    public function store()
    {
        
        // validate user data submitted and store them in the variable $attributes
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'profile_pic' => ['image'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // check to see if a profile picture was added
        // if so, store profile_pic in profile_pics folder storage>app>public>profile_pics
        // otherwise, set profile pic to generic picture in public>images
        if(isset($attributes['profile_pic'])){
            $attributes['profile_pic'] = request()->file('profile_pic')->store('profile_pics');
        } 

        // create the user with validated attributes
        $user = User::create($attributes);

        // log the user in 
        auth()->login($user);

        // redirect user to homepage after creating a profile
        // and flash a message saying account has been created successfully
        return redirect('/')->with('success', 'Sua conta foi criada!');
    }
}
