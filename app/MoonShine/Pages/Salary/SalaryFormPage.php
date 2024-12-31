<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Salary;

use Throwable;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Components\ActionButton;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;

class SalaryFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Date::make(__('ui.date'), 'event_date')->format('d.m.Y'),
            Number::make(__('ui.sum'), 'sum')->badge('primary'),
            Text::make(__('ui.comment'), 'comment'),
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
