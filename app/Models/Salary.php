<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity;

class Salary extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryFactory> */
    use HasFactory, SoftDeletes, MassPrunable, LogsActivity;

    //protected static $logAttributes = ['attribute1', 'attribute2'];

    //protected static $logName = 'your_model';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['event_date', 'sum', 'comment'])
            ->useLogName('salary')
            //->logOnlyDirty()
        ;
        // Chain fluent methods for configuration options
    }

    protected $fillable = [
        'id',
        'event_date',
        'owner',
        'driver_id',
        'sum',
        'comment',
        'profit_id',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function log(): HasMany
    {
        return $this->hasMany(Activity::class, 'subject_id');
    }

    /**
     * owner
     * Получить данные о создателе записи.
     * @return void
     */
    // public function owner()
    // {
    //     return $this->belongsTo(User::class, 'owner_id', 'id');
    // }

    /**
     * driver
     * Получить данные о водителе.
     * @return void
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }

    /**
     * createdAt
     *
     * @return Attribute
     */
    // protected function createdAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(string $value) => Carbon::parse($value)
    //             ->format(config('app.date_full_format')),
    //     );
    // }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    // protected function updatedAt(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(string $value) => Carbon::parse($value)
    //             ->format(config('app.date_full_format')),
    //     );
    // }

    /**
     * prunable
     * Запрос для удаления устаревших записей модели.
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('deleted_at', '<=', now()->subDay());
    }
}
