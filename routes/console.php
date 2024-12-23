<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Очистка устаревших токенов восстановления пароля
Schedule::command('auth:clear-resets')
->everyFifteenMinutes()
->runInBackground()
->emailOutputTo('arttema@mail.ru');

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly()
->emailOutputTo('arttema@mail.ru');
