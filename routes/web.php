<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\AuthDriverComponent;

Route::get('/', function () {
    return view('welcome')->name('welcome');
});



Route::get('login', AuthDriverComponent::class);
