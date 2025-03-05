<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeDto extends Command
{
    /**
     * El nombre y la firma del comando de consola.
     *
     * @var string
     */
    protected $signature = 'make:dto {name}';

    /**
     * La descripción del comando de consola.
     *
     * @var string
     */
    protected $description = 'Crea un nuevo Data Transfer Object (DTO) en app/DTOs';

    /**
     * Ejecutar el comando.
     */
    public function handle(): void
    {
        $name = $this->argument('name');
        $namespace = 'App\\DTOs';
        $className = ucfirst($name);
        $directory = app_path('DTOs');
        $path = "{$directory}/{$className}.php";

        $filesystem = new Filesystem();

        // Crear directorio si no existe
        if (!$filesystem->exists($directory)) {
            $filesystem->makeDirectory($directory, 0755, true);
        }

        // Verificar si el DTO ya existe
        if ($filesystem->exists($path)) {
            $this->error("El DTO {$className} ya existe.");
            return;
        }

        // Cargar el stub y reemplazar los valores
        $stub = file_get_contents(base_path('stubs/dto.stub'));
        $stub = str_replace(['{{ namespace }}', '{{ class }}'], [$namespace, $className], $stub);

        // Crear el archivo con el contenido generado
        $filesystem->put($path, $stub);

        $this->info("DTO {$className} creado exitosamente en {$path}");
    }
}
