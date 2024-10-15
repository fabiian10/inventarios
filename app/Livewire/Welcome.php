<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $name = '';
    public $greeting = '';

    public function mount()
    {
        $this->greeting = 'Bienvenido a nuestro proyecto Laravel';
    }

    public function updateGreeting()
    {
        if ($this->name) {
            $this->greeting = "Hola, {$this->name}! Bienvenido a nuestro proyecto Laravel";
        } else {
            $this->greeting = 'Bienvenido a nuestro proyecto Laravel';
        }
    }

    public function render()
    {
        $navItems = [
            ['route' => 'home', 'name' => 'Inicio'],
        ];

        return view('livewire.welcome', compact('navItems'));
    }
}
