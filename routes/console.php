<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Очистка устаревших токенов восстановления пароля
Schedule::command('auth:clear-resets')
->hourly()
->runInBackground()
->emailOutputTo('arttema@mail.ru');
