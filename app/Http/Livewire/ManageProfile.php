<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ManageProfile extends Component
{
    public User $user;
    public $showConfirmDeleteModal = false;

    public function confirmDelete()
    {
        $this->showConfirmDeleteModal = true; 
    }

    public function destroy()
    {
        $this->user->delete();

        return redirect('/')->with('success', 'Perfil deletado :(');
    }

    public function render()
    {
        return view('livewire.manage-profile');
    }
}
