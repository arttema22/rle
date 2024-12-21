<?php

namespace App\Livewire\Nav;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Redirect;

class AuthNavBar extends Component
{
    public function render()
    {
        return view('livewire.nav.auth-nav-bar');
    }

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
    }
}
