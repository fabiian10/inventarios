<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-storage', function() {
    $results = [];
    $disk = 'documentos';

    // 1. Verificar si el disk está configurado
    try {
        $disk_exists = config("filesystems.disks.{$disk}") ? true : false;
        $results['disk_config'] = $disk_exists ? "El disk '{$disk}' está configurado" : "El disk '{$disk}' no está configurado";
    } catch (\Exception $e) {
        $results['disk_config'] = "Error al verificar configuración: " . $e->getMessage();
    }

    // 2. Verificar si el directorio existe y es escribible
    try {
        $path = Storage::disk($disk)->path('');
        $results['directory'] = [
            'path' => $path,
            'exists' => is_dir($path) ? "Sí" : "No",
            'writable' => is_writable($path) ? "Sí" : "No",
            'permissions' => substr(sprintf('%o', fileperms($path)), -4)
        ];
    } catch (\Exception $e) {
        $results['directory'] = "Error al verificar directorio: " . $e->getMessage();
    }

    // 3. Intentar escribir un archivo de prueba
    try {
        $testFile = 'test_' . time() . '.txt';
        $written = Storage::disk($disk)->put($testFile, 'Test content');
        $results['write_test'] = $written ? "Archivo de prueba creado exitosamente" : "No se pudo crear el archivo de prueba";
        
        if ($written) {
            // Intentar leer el archivo
            $content = Storage::disk($disk)->get($testFile);
            $results['read_test'] = $content === 'Test content' ? "Archivo leído correctamente" : "El contenido del archivo no coincide";
            
            // Obtener la URL
            $url = Storage::disk($disk)->url($testFile);
            $results['url'] = $url;
            
            // Limpiar
            Storage::disk($disk)->delete($testFile);
        }
    } catch (\Exception $e) {
        $results['write_test'] = "Error al realizar prueba de escritura: " . $e->getMessage();
    }

    return response()->json($results);
});