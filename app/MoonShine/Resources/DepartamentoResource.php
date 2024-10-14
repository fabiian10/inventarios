<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;
use App\MoonShine\Pages\Departamento\DepartamentoIndexPage;
use App\MoonShine\Pages\Departamento\DepartamentoFormPage;
use App\MoonShine\Pages\Departamento\DepartamentoDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Pages\Page;
use Closure;
use Illuminate\View\ComponentAttributeBag;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Departamento>
 */
class DepartamentoResource extends ModelResource
{
    protected string $model = Departamento::class;

    protected string $title = 'Departamentos';

    protected bool $createInModal = true; 
 
    protected bool $editInModal = true; 
 
    protected bool $detailInModal = false;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nombre Departamento'),
                Text::make('Nombre Titular'),
                Text::make('Tratamiento'),
                Text::make('Cargo'),
                Text::make('Prefijo'),
                Text::make('Carpeta Documentos'),
                Text::make('Ur')
            ]),
        ];
    }

    public function trAttributes(): Closure 
    {
        return function (
            Model $item,
            int $row,
            ComponentAttributeBag $attr
        ): ComponentAttributeBag {
            if ($item->id === 1 | $row === 2) {
                $attr->setAttributes([
                    'class' => 'bgc-green'
                ]);
            }
 
            return $attr;
        };
    } 
 
    public function tdAttributes(): Closure 
    {
        return function (
            Model $item,
            int $row,
            int $cell,
            ComponentAttributeBag $attr = null
        ): ComponentAttributeBag {
            if ($cell === 6) {
                $attr->setAttributes([
                    'class' => 'bgc-red'
                ]);
            }
 
            return $attr;
        };
    } 

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            DepartamentoIndexPage::make($this->title()),
            DepartamentoFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            DepartamentoDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Departamento $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
