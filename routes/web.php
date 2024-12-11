<?php

use App\Livewire\Auth\LoginDriver;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Salary\SalaryManager;

Route::get('/', Home::class)->name('home');
Route::get('/login', LoginDriver::class)->name('login');

Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/salaries', SalaryManager::class)->name('salaries');
    }
);
