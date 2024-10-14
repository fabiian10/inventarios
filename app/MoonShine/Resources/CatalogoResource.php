<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Catalogo;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Catalogo>
 */
class CatalogoResource extends ModelResource
{
    protected string $model = Catalogo::class;

    protected string $title = 'Catalogos';

    protected bool $createInModal = true; 
 
    protected bool $editInModal = true; 
 
    protected bool $detailInModal = false;
    
    public function redirectAfterSave(): string{
        return '/inventarios/resource/catalogo-resource/index-page';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Oficina'),
                Text::make('Titular'),
                Text::make('Tratamiento'),
                Text::make('Cargo'),
                Text::make('Prefijo'),
                Text::make('Carpeta_Documentos'),
                Text::make('Ur')
            ]),
        ];
    }

    /**
     * @param Catalogo $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
