<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;

    public $name;
    public $username;
    public $profile_pic;
    public $password;
    public $tempUrl;
    public $profilePicId;

    protected $rules = [
        'name' => ['required', 'max:255'],
        'username' => ['required', 'min:3', 'max:255', 'unique:users,username'], 
        'profile_pic' => ['image', 'nullable'],
        'password' => ['required', 'min:7', 'max:255']
    ];

    protected $validationAttributes = [
        'profile_pic' => 'foto de perfil'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedProfile_pic()
    {
        $this->validate();
    }

    public function store()
    {

        // validate user data submitted and store them in the variable $attributes
        $attributes = $this->validate();

        // check to see if a profile picture was added
        // if so, store profile_pic in profile_pics folder storage>app>public>profile_pics
        // otherwise, set profile pic to generic picture in public>images
        if (isset($attributes['profile_pic'])) {
            $attributes['profile_pic'] = $this->profile_pic->store('profile_pics');
        }

        // create the user with validated attributes
        $user = User::create($attributes);

        // log the user in 
        auth()->login($user);

        // redirect user to homepage after creating a profile
        // and flash a message saying account has been created successfully
        return redirect('/')->with('success', 'Sua conta foi criada!');
    }

    public function removeSelectedProfilePic()
    {
        $this->profile_pic = null;
        $this->profilePicId++;
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
