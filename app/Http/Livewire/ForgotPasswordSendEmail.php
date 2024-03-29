<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordSendEmail extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(Request $request)
    {
        $this->validate();

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink([
            'email' => $this->email
        ]);

        if ($status == Password::RESET_LINK_SENT) {
            return session()->flash('status', __($status));
        }

        throw ValidationException::withMessages([
            'email' => __($status)
        ]);
    }

    public function render()
    {
        return view('livewire.forgot-password-send-email');
    }
}
