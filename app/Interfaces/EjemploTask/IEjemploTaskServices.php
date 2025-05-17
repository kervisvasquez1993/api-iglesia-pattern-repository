<?php

namespace App\Interfaces\EjemploTask;

use App\DTOs\EjemploTask\DTOsEjemploTask;

interface IEjemploTaskServices 
{
    public function getAllEjemploTask();
    public function getEjemploTaskById($id);
    public function createEjemploTask(DTOsEjemploTask $data);
    public function updateEjemploTask(DTOsEjemploTask $data, $id);
    public function deleteEjemploTask($id);
}
