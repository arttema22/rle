<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Driver;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\Text;
use Throwable;

class DriverFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Text::make('last_name'),
            Text::make('first_name'),
            Text::make('middle_name'),
            Text::make('e1_card'),
            Email::make('email'),
            Password::make('password'),
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
