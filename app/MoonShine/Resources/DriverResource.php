<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;
use Illuminate\Validation\Rule;
use MoonShine\Laravel\Pages\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;
use App\MoonShine\Pages\Driver\DriverFormPage;
use MoonShine\Laravel\Resources\ModelResource;
use App\MoonShine\Pages\Driver\DriverIndexPage;
use App\MoonShine\Pages\Driver\DriverDetailPage;

/**
 * @extends ModelResource<User, DriverIndexPage, DriverFormPage, DriverDetailPage>
 */
//#[Icon('heroicons.outline.users')]
class DriverResource extends ModelResource
{
    protected string $model = User::class;

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'last_name';

    // Тип сортировки по умолчанию
    // protected string $sortDirection = 'ASC';

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'last_name';

    protected string $title = 'Drivers';

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            DriverIndexPage::class,
            DriverFormPage::class,
            DriverDetailPage::class,
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($item->id)],
            'password' => [
                'sometimes',
                'nullable',
                'bail',
                'required',
                Password::min(8)->mixedCase()->numbers(),
                'confirmed'
            ],
        ];
    }
}
