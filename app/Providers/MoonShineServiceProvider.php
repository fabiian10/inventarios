<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\InventarioResource;
use App\MoonShine\Resources\CatalogoResource;
use App\MoonShine\Resources\DepartamentoResource;
use App\MoonShine\Resources\PdfFileResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),

            MenuGroup::make('System', [
                MenuItem::make('Admins', new \Sweet1s\MoonshineRBAC\Resource\UserResource(), 'heroicons.outline.users'),
                MenuItem::make('Roles', new \Sweet1s\MoonshineRBAC\Resource\RoleResource(), 'heroicons.outline.shield-exclamation'),
                MenuItem::make('Permissions', new \Sweet1s\MoonshineRBAC\Resource\PermissionResource(), 'heroicons.outline.shield-exclamation'),
            ], 'heroicons.outline.user-group'),
            MenuItem::make('Inventarios', new InventarioResource),
            MenuItem::make('Catalogos', new CatalogoResource),
            MenuItem::make('Departamentos', new DepartamentoResource),
            MenuItem::make('SSP Michoacán', 'https://ssp.michoacan.gob.mx/')
                ->badge(fn() => 'Visita el sitio')
                ->blank(),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [
            'colors' => [
                'primary' => 'rgb(120, 67, 233)',
                'secondary' => 'rgb(236, 65, 118)',
                'body' => 'rgb(27, 37, 59)',
                'dark' => [
                    'DEFAULT' => 'rgb(30, 31, 67)',
                    50 => 'rgb(83, 103, 132)',
                    100 => 'rgb(74, 90, 121)',
                    200 => 'rgb(65, 81, 114)',
                    300 => 'rgb(53, 69, 103)',
                    400 => 'rgb(48, 61, 93)',
                    500 => 'rgb(41, 53, 82)',
                    600 => 'rgb(40, 51, 78)',
                    700 => 'rgb(39, 45, 69)',
                    800 => 'rgb(27, 37, 59)',
                    900 => 'rgb(15, 23, 42)',
                ],
 
                'success-bg' => 'rgb(0, 170, 0)',
                'success-text' => 'rgb(255, 255, 255)',
                'warning-bg' => 'rgb(255, 220, 42)',
                'warning-text' => 'rgb(139, 116, 0)',
                'error-bg' => 'rgb(224, 45, 45)',
                'error-text' => 'rgb(255, 255, 255)',
                'info-bg' => 'rgb(0, 121, 255)',
                'info-text' => 'rgb(255, 255, 255)',
            ],
            'darkColors' => [
                'body' => 'rgb(27, 37, 59)',
                'success-bg' => 'rgb(17, 157, 17)',
                'success-text' => 'rgb(178, 255, 178)',
                'warning-bg' => 'rgb(225, 169, 0)',
                'warning-text' => 'rgb(255, 255, 199)',
                'error-bg' => 'rgb(190, 10, 10)',
                'error-text' => 'rgb(255, 197, 197)',
                'info-bg' => 'rgb(38, 93, 205)',
                'info-text' => 'rgb(179, 220, 255)',
            ]
        ];
    }
}
