<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define los comandos de consola de la aplicación.
     */
    protected $commands = [
        \App\Console\Commands\MakeDTO::class
    ];

    /**
     * Define el programa de tareas programadas.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Aquí puedes agregar tareas programadas, ejemplo:
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Registra los comandos de consola de la aplicación.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
