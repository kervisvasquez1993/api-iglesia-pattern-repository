<?php

namespace App\Interfaces\EjemploTask;

use App\DTOs\EjemploTask\DTOsEjemploTask;
use App\Models\EjemploTask;

interface IEjemploTaskRepository 
{
    public function getAllEjemploTask();
    public function getEjemploTaskById($id): EjemploTask;
    public function createEjemploTask(DTOsEjemploTask $data): EjemploTask;
    public function updateEjemploTask(DTOsEjemploTask $data, EjemploTask $EjemploTask): EjemploTask;
    public function deleteEjemploTask(EjemploTask $EjemploTask): EjemploTask;
}
