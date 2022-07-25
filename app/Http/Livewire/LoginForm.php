<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\ValidationException;

class LoginForm extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // logs user in 
    public function store()
    {
        $attributes = $this->validate();

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Ebaa! Bem-vindo(a) de volta :D');
        }

        throw ValidationException::withMessages([
            'email' => 'Suas credencias não puderam ser validadas.'
        ]);
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
