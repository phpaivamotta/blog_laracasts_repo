<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;

class ResetPasswordForm extends Component
{
    public $user;
    public $token;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount(Request $request)
    {
        $this->token = $request->token;
        $this->email = $request->email;
        $this->user = User::where('email', $this->email)->first();
    }

    protected $rules = [
        'token' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', 'min:7', 'max:255']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token
            ],
            function () {
                $this->user->forceFill([
                    'password' => $this->password,
                    'remember_token' => Str::random(60)
                ])->save();

                event(new PasswordReset($this->user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', __($status));
        }

        throw ValidationException::withMessages([
            'email' => __($status)
        ]);
    }

    public function render()
    {
        return view('livewire.reset-password-form');
    }
}
