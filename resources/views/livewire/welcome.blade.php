<div class="flex h-screen bg-gray-100">
    <!-- Panel lateral -->
    <div class="w-64 bg-white shadow-md">
        <div class="p-4">
            <h2 class="text-xl font-semibold text-gray-800">Navegación</h2>
        </div>
        <div>
            
        </div>
        <nav class="mt-4">
            @foreach($navItems as $item)
                <a href="{{ route($item['route']) }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">
                    {{ $item['name'] }}
                </a>
                <a href="http://127.0.0.1:8000/inventarios" class="block py-2 px-4 text-gray-700 hover:bg-gray-200">Inventarios</a>
            @endforeach
        </nav>
    </div>

    <!-- Contenido principal -->
    <div class="flex-1 flex items-center justify-center p-8" style="background-image: url('/images/montanas.jpg'); background-size: cover; background-position: center;">
        <div class="bg-white p-8 rounded-lg shadow-md bg-opacity-80">
            <h1 class="text-3xl font-bold mb-4">{{ $greeting }}</h1>
            <div class="mb-4">
                <input type="text" wire:model="name" wire:keyup="updateGreeting" placeholder="Ingresa tu nombre" class="border p-2 rounded w-full">
            </div>            
            <p class="text-gray-600">Este es un componente Livewire en tu proyecto Laravel.</p>
        </div>
    </div>
</div>