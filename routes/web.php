<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Salary\SalaryManager;

Route::get('/', Home::class)->name('home');

Route::middleware(['first', 'second'])->group(
    function () {
        Route::get('/dashboard', Dashboard::class)->middleware('auth')->name('dashboard');
    }
);



Route::get('/salaries', SalaryManager::class)->name('salaries');
