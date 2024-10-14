<?php
namespace App\MoonShine\Resources;

use App\Models\PdfFile;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Date;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\File;
use MoonShine\Fields\Preview;
use MoonShine\Resources\Resource;
use MoonShine\Actions\FileDowloadAction;
use MoonShine\Decorations\Block;
use MoonShine\Filters\TextFilter;

abstract class PdfFileResource extends ModelResource
{
    public static string $model = PdfFile::class;
    
    public static string $titulo = 'PDF Files';
    
    public function fields(): array
    {
        return [
            Block::make('PDF Information', [
                ID::make()->sortable(),
                Text::make('Title', 'titulo')
                    ->required(),
                Text::make('Description', 'descripcion')
                    ->textarea(),
                File::make('PDF File', 'file_path')
                    ->required()
                    ->disk('public')
                    ->dir('pdfs')
                    ->allowedExtensions(['pdf']),
                Preview::make('PDF Viewer', 'file_path')
                    ->link()
                    ->when(
                        fn($item) => $item->exists,
                        fn($preview) => $preview->customPreview(function($item) {
                            return view('moonshine::components.pdf-viewer', [
                                'pdf' => $item
                            ])->render();
                        })
                    ),
                Date::make('Created At', 'created_at')
                    ->format('d/m/Y H:i')
                    ->sortable()
                    ->hideOnForm(),
            ]),
        ];
    }
    
    public function rules(Model $item): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'file_path' => ['required', 'file', 'mimes:pdf', 'max:10240'],
        ];
    }

    public function search(): array
    {
        return ['id', 'titulo', 'descripcion'];
    }
    
    public function filters(): array
    {
        return [
            TextFilter::make('Title')->attribute('titulo'),
        ];
    }
    
    public function actions(): array
    {
        return [
            FileDowloadAction::make('Download PDF', function ($item) {
                return storage_path('app/public/' . $item->file_path);
            }),
        ];
    }
}