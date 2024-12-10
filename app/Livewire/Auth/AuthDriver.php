<?php

namespace App\Livewire\Auth;

use session;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthDriver extends Component
{
    public $email;
    public $password;

    public $isOpenloginForm = false;

    public function open()
    {
        $this->isOpenloginForm = true;
    }

    public function close()
    {
        $this->isOpenloginForm = false;
    }

    public function authenticate(Request $request) //: RedirectResponse
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('home');
    }

    public function render()
    {
        return view('livewire.auth.auth-driver');
    }
}
