<?php

use App\Livewire\Home;
use App\Livewire\Dashboard;
use App\Livewire\Auth\LoginDriver;
use App\Livewire\Btrip\BtripManager;
use Illuminate\Support\Facades\Route;
use App\Livewire\Salary\SalaryManager;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/', Home::class)->name('home');
Route::get('/login', LoginDriver::class)->name('login');



Route::middleware(['guest'])->group(
    function () {
        Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('password.request');

        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendLink'])->name('password.email');

        Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

        Route::post('/reset-password', [ForgotPasswordController::class, 'passwordUpdate'])->name('password.update');
        }
);







Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('salaries', SalaryManager::class)->name('salaries');

        Route::get('btrips', BtripManager::class)->name('btrips');
    }
);
