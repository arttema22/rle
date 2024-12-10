<?php

namespace App\Livewire\Auth;

use session;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthDriverComponent extends Component
{
    public $email;
    public $password;

    public function authenticate() //: RedirectResponse
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //dd($credentials);
        if (Auth::attempt($credentials)) {
            // session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function render()
    {
        return view('livewire.auth.auth-driver-component');
    }
}
