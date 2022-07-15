<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class RegisterForm extends Component
{

    public $name;
    public $username;
    public $profile_pic;
    public $password;

    protected $rules = [
        'name' => ['required', 'max:255'],
        'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
        'profile_pic' => ['image'],
        'password' => ['required', 'min:7', 'max:255']
    ];

    public function create()
    {

        // validate user data submitted and store them in the variable $attributes
        $attributes = $this->validate();

        // check to see if a profile picture was added
        // if so, store profile_pic in profile_pics folder storage>app>public>profile_pics
        // otherwise, set profile pic to generic picture in public>images
        if (isset($attributes['profile_pic'])) {
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

    public function render()
    {
        return view('livewire.register-form');
    }
}
