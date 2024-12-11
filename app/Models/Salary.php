<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    /** @use HasFactory<\Database\Factories\SalaryFactory> */
    use HasFactory, SoftDeletes, MassPrunable;

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
