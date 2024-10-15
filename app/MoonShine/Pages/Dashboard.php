<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Bienvenido';
    }

    protected function topLayer(): array 
    {
        return [
            Heading::make('Custom top'),
            ...parent::topLayer()
        ];
    } 
 
    protected function mainLayer(): array 
    {
        return [
            Heading::make('Custom main'),
            ...parent::mainLayer()
        ];
    } 
 
    protected function bottomLayer(): array 
    {
        return [
            Heading::make('Custom bottom'),
            ...parent::bottomLayer()
        ];
    } 

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [];
	}
}
