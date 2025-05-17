<?php

namespace App\Repository\EjemploTask;

use App\DTOs\EjemploTask\DTOsEjemploTask;
use App\Interfaces\EjemploTask\IEjemploTaskRepository;
use App\Models\EjemploTask;

class EjemploTaskRepository implements IEjemploTaskRepository 
{
    public function getAllEjemploTask()
    {
        $EjemploTasks = EjemploTask::all();
        return $EjemploTasks;
    }
    
    public function getEjemploTaskById($id): EjemploTask
    {
        $EjemploTask = EjemploTask::where('id', $id)->first();
        if (!$EjemploTask) {
            throw new \Exception("No results found for EjemploTask with ID {$id}");
        }
        return $EjemploTask;
    }
    
    public function createEjemploTask(DTOsEjemploTask $data): EjemploTask
    {
        $result = EjemploTask::create($data->toArray());
        return $result;
    }
    
    public function updateEjemploTask(DTOsEjemploTask $data, EjemploTask $EjemploTask): EjemploTask
    {
        $EjemploTask->update($data->toArray());
        return $EjemploTask;
    }
    
    public function deleteEjemploTask(EjemploTask $EjemploTask): EjemploTask
    {
        $EjemploTask->delete();
        return $EjemploTask;
    }
}
