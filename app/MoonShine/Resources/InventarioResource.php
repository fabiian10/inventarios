<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inventario;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Text;
use MoonShine\Fields\File;
use Illuminate\Support\Facades\Storage; 

/**
 * @extends ModelResource<Inventario>
 */
class InventarioResource extends ModelResource
{
    
    protected string $model = Inventario::class;

    protected string $title = 'Tabla de Inventarios';

    protected bool $createInModal = true; 
 
    protected bool $editInModal = true; 
 
    protected bool $detailInModal = false;
    
    public function redirectAfterSave(): string{
        return '/inventarios/resource/inventario-resource/index-page';
    }

    public function getActiveActions(): array
    {
        return ['create', 'view', 'update', 'delete', 'massDelete'];
    }
    

    
    /**
     * @return list<MoonShineComponent|Field>
     */
    /*public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Unidad'),
                Text::make('Area'),
                Text::make('Fondo'),
                Text::make('Seccion'),
                Text::make('Serie')
            ]),
        ];
    }*/

    public function indexFields(): array 
    {
        return [
            ID::make()->sortable(),
            Text::make('Unidad'),
            Text::make('Area'),
            Text::make('Fondo'),
            Text::make('Seccion'),
            Text::make('Serie'),
            File::make('Archivo'),
        ];
        
    } 
 
    public function formFields(): array 
    {
        return [
            ID::make(),
            Text::make('Unidad'),
            Text::make('Area'),
            Text::make('Fondo'),
            Text::make('Seccion'),
            Text::make('Serie'),
            File::make('Archivo')
                ->disk('documentos')
                ->dir('pdfs')
                ->keepOriginalFileName(), 
        ];
    } 
 
    public function detailFields(): array 
    {
        return [
            Text::make('Unidad', 'unidad'),
            Text::make('Area', 'area'),
            Text::make('Fondo', 'fondo'),
            File::make('Archivo', 'archivo'),
                        
        ];        
    } 
    /**
     * @param Inventario $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
