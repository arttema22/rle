<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Closure;
use App\Models\Salary;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\Date;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Components\Icon;
use MoonShine\Support\Enums\PageType;
use MoonShine\UI\Collections\TableRows;
use MoonShine\UI\Collections\TableCells;
use MoonShine\Laravel\QueryTags\QueryTag;
use MoonShine\UI\Components\ActionButton;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\UI\Components\Table\TableRow;
use MoonShine\Contracts\UI\TableRowContract;
use App\MoonShine\Pages\Salary\SalaryFormPage;
use MoonShine\Laravel\Resources\ModelResource;
use App\MoonShine\Pages\Salary\SalaryIndexPage;
use MoonShine\UI\Components\Table\TableBuilder;
use App\MoonShine\Pages\Salary\SalaryDetailPage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Contracts\UI\Collection\TableRowsContract;

/**
 * @extends ModelResource<Salary, SalaryIndexPage, SalaryFormPage, SalaryDetailPage>
 */
#[Icon('heroicons.outline.banknotes')]
class SalaryResource extends ModelResource
{
    // Модель данных
    protected string $model = Salary::class;

    protected string $title = 'Salaries';

    // Жадная загрузка
    public array $with = ['driver'];

    // Поле для отображения значений в связях и хлебных крошках
    public string $column = 'event_date';

    // Поле сортировки по умолчанию
    protected string $sortColumn = 'event_date';

    // Тип сортировки по умолчанию
    protected SortDirection $sortDirection = SortDirection::DESC;

    protected ?string $alias = 'salaries';

    protected ?PageType $redirectAfterSave = PageType::INDEX;


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
        return [
            'event_date' => ['required', 'date', 'before_or_equal:today'],
            'sum' => ['required', 'decimal:0,2', 'min:10', 'max:9999999.99'],
        ];
    }

    protected function filters(): iterable
    {
        return [
            BelongsTo::make(
                __('ui.driver'),
                'driver',
                resource: DriverResource::class,
                formatted: fn($item) => $item->last_name . ' ' . $item->first_name
            )
                ->searchable()
                ->nullable(),
            Date::make(__('ui.date'), 'event_date')->format('d.m.Y')
                ->nullable(),
        ];
    }

    protected function queryTags(): array
    {
        return [
            QueryTag::make(
                __('ui.active'),
                fn(Builder $query) => $query->whereNull('profit_id')
            )->default()
                ->alias('active'),
            QueryTag::make(
                __('ui.archive'),
                fn(Builder $query) => $query->whereNotNull('profit_id')
            )->alias('archive')
        ];
    }

    protected function formBuilderButtons(): ListOf
    {
        return parent::formBuilderButtons()->add(
            ActionButton::make('Back', fn() => $this->getIndexPageUrl())->class('btn-lg')
        );
    }

    protected function detailButtons(): ListOf
    {
        return parent::detailButtons()->add(
            ActionButton::make('Back', fn() => $this->getIndexPageUrl())->class('btn-lg')
        );
    }

    protected function search(): array
    {
        return ['event_date', 'sum', 'driver.last_name', 'comment'];
    }
}
