<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Salary;

use Throwable;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;

class SalaryDetailPage extends DetailPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make('id'),
            Date::make(__('ui.date'), 'event_date')->format('d.m.Y'),
            Number::make(__('ui.sum'), 'sum')->badge('primary'),
            Text::make(__('ui.comment'), 'comment'),
            Text::make(__('ui.driver'), 'driver.full_name'),
            Text::make(__('ui.owner'), 'owner'),
            Date::make(__('ui.created'), 'created_at')->format('d.m.Y H:i'),
            Date::make(__('ui.updated'), 'updated_at')->format('d.m.Y H:i'),
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
