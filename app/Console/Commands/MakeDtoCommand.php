<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;


class MakeDtoCommand extends Command
{
    protected $signature = 'make:dto {name}';
    protected $description = 'Create a new DTO class';

    public function handle()
    {
        $name = $this->argument('name');
        $filesystem = new Filesystem();

        // Parsear nombre y namespace
        $segments = explode('/', $name);
        $className = array_pop($segments);
        $subDirectory = implode('/', $segments);
        $namespace = 'App\\DTOs' . ($subDirectory ? '\\' . str_replace('/', '\\', $subDirectory) : '');

        // Ruta del archivo
        $directory = app_path('DTOs/' . $subDirectory);
        $path = $directory . '/' . $className . '.php';

        // Verificar si existe
        if ($filesystem->exists($path)) {
            $this->error("¡El DTO {$className} ya existe!");
            return;
        }

        // Crear directorio si no existe
        if (!$filesystem->isDirectory($directory)) {
            $filesystem->makeDirectory($directory, 0755, true);
        }

        // Generar contenido desde el stub
        $stub = file_get_contents(base_path('stubs/dto.stub'));
        $stub = str_replace(['{{ namespace }}', '{{ class }}'], [$namespace, $className], $stub);

        // Escribir archivo
        $filesystem->put($path, $stub);

        $this->info("DTO creado exitosamente: {$path}");
    }
}