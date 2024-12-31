<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Driver;

use Throwable;
use MoonShine\UI\Fields\Text;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Pages\Crud\IndexPage;
use MoonShine\Contracts\UI\ComponentContract;

class DriverIndexPage extends IndexPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make(__('ui.fullname'), 'fullname'),
            Text::make(__('ui.driver'), 'e1_card'),
            Text::make(__('ui.owner'), 'email'),
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
