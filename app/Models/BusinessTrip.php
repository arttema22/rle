<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity;

class BusinessTrip extends Model
{
    use HasFactory, MassPrunable, LogsActivity;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'event_date',
        'owner',
        'driver_id',
        'sum',
        'comment',
        'profit_id',
    ];

    /**
     * casts
     *
     * @return array
    */
    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    /**
     * getActivitylogOptions
     *
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['event_date', 'sum', 'comment'])
            ->useLogName('btrip');
    }

    /**
     * log
     *
     * @return HasMany
     */
    public function log(): HasMany
    {
        return $this->hasMany(Activity::class, 'subject_id')
            ->where('log_name', 'btrip');
    }

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
     * prunable
     * Запрос для удаления устаревших записей модели.
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('profit_id', '!=', 0)
        ->where('created_at', '<', now()->subDay(90));
    }
}
