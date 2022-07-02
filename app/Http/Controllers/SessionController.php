<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User as ModelsUser;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

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
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Ebaa! Bem-vindo(a) de volta :D');
        }

        throw ValidationException::withMessages([
            'username' => 'Suas credencias não puderam ser validadas.'
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
            'user' => request()->user()
        ]);
    }

    public function update()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore(request()->user()->id)],
            'profile_pic' => ['image'],
        ]);

        if (request('nopic')) 
        {
            $attributes['profile_pic'] = null;
        }
        elseif (isset($attributes['profile_pic'])) 
        {
            $attributes['profile_pic'] = request()->file('profile_pic')->store('profile_pics');
        }

        request()->user()->update($attributes);

        return redirect('/')->with('success', 'Seu perfil foi atualizado!');
    }
}
