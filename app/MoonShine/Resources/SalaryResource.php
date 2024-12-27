<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Salary;
use MoonShine\UI\Fields\Text;
use MoonShine\Laravel\Pages\Page;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Pages\Salary\SalaryFormPage;

use MoonShine\Laravel\Resources\ModelResource;
use App\MoonShine\Pages\Salary\SalaryIndexPage;
use App\MoonShine\Pages\Salary\SalaryDetailPage;
use MoonShine\UI\Fields\Select;

/**
 * @extends ModelResource<Salary, SalaryIndexPage, SalaryFormPage, SalaryDetailPage>
 */
class SalaryResource extends ModelResource
{
    protected string $model = Salary::class;

    protected string $title = 'Salaries';

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [
            SalaryIndexPage::class,
            SalaryFormPage::class,
            SalaryDetailPage::class,
        ];
    }

    /**
     * @param Salary $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }

    protected function filters(): iterable
    {
        return [
            Select::make('owner'),
            Text::make('Title', 'owner'),
        ];
    }
}
