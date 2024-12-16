<?php

namespace App\Models\Dir;

use App\Models\Main\Service;
use App\Models\Tariff\TariffService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DirService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * tariff
     * Получить тариф для сервиса.
     * @return HasOne
     */
    public function tariff(): HasOne
    {
        return $this->hasOne(TariffService::class, 'service_id');
    }

    /**
     * services
     * Получить все услуги для сервиса.
     * @return HasMany
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }
}
