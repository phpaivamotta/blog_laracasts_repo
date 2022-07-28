<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditForm extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $email;
    public $username;
    public $profile_pic;
    public $profilePicId;
    public $tempUrl;

    protected function rules()
    {
        // check to see if $profile_pic is a string because if it is, then it has already been stored into the storage public/storage folder
        if (is_string($this->profile_pic)) {
            return [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
                'username' => ['required', 'min:3', 'max:255', 'unique:users,username,' . $this->user->id]
            ];
        } else {
            return [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
                'username' => ['required', 'min:3', 'max:255', 'unique:users,username,' . $this->user->id],
                'profile_pic' => ['image', 'nullable']
            ];
        }
    }

    protected $validationAttributes = [
        'profile_pic' => 'foto de perfil'
    ];

    public function mount(User $user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->profile_pic = $user->profile_pic;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedProfile_pic()
    {
        $this->validate();
    }

    public function removeSelectedProfilePic()
    {
        $this->profile_pic = null;
        $this->profilePicId++;
    }

    public function update()
    {
        // validate user data submitted and store them in the variable $attributes
        $attributes = $this->validate();

        // check to see if a profile picture was added
        // if so, store profile_pic in profile_pics folder storage>app>public>profile_pics
        // otherwise, set profile pic to generic picture in public>images
        if (isset($attributes['profile_pic'])) {
            $attributes['profile_pic'] = $this->profile_pic->store('profile_pics');
        }

        // update the user with validated attributes
        $this->user->update($attributes);

        // redirect user to homepage after creating a profile
        // and flash a message saying account has been created successfully
        return redirect('/')->with('success', 'Seu perfil foi atualizado!');
    }

    public function render()
    {
        return view('livewire.edit-form');
    }
}
