<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{

    public $modal = false;

    public User $currentUser;

    public function mount()
    {
        $this->currentUser = new User;
    }

    public function destroy()
    {
        $this->currentUser->delete();

        $this->modal = false;
    }

    public function confirmDelete(User $object)
    {
        $this->currentUser = $object;

        $this->modal = true;
    }


    public function render()
    {
        return view('livewire.delete-user', [
            'users' => User::with(['comments', 'likes'])->paginate(50),
        ]);
    }
}
