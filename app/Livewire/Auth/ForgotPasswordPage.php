<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot password')]
class ForgotPasswordPage extends Component
{
    public $email;

    public function save()
    {
        $this->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Password reset link sent.');
            $this->email = '';
        } else {
            session()->flash('error', 'Unable to send password reset link.');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
