<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginDriver extends Component
{
    public $email;
    public $password;
    public $remember;

    public function render()
    {
        return view('livewire.auth.login-driver');
    }

    public function authenticate(Request $request) //: RedirectResponse
    {
        // dd($request);
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

 $remember = $this->remember;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

}
