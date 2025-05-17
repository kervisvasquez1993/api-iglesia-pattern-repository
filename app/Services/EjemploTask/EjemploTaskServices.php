<?php

namespace App\Services\EjemploTask;

use App\DTOs\EjemploTask\DTOsEjemploTask;
use App\Interfaces\EjemploTask\IEjemploTaskServices;
use App\Repository\EjemploTask\EjemploTaskRepository;
use Exception;

class EjemploTaskServices implements IEjemploTaskServices 
{
    protected EjemploTaskRepository $EjemploTaskRepository;
    
    public function __construct(EjemploTaskRepository $EjemploTaskRepository)
    {
        $this->EjemploTaskRepository = $EjemploTaskRepository;
    }
    
    public function getAllEjemploTask()
    {
        try {
            $results = $this->EjemploTaskRepository->getAllEjemploTask();
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function getEjemploTaskById($id)
    {
        try {
            $results = $this->EjemploTaskRepository->getEjemploTaskById($id);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function createEjemploTask(DTOsEjemploTask $data)
    {
        try {
            $results = $this->EjemploTaskRepository->createEjemploTask($data);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function updateEjemploTask(DTOsEjemploTask $data, $id)
    {
        try {
            $EjemploTask = $this->EjemploTaskRepository->getEjemploTaskById($id);
            $results = $this->EjemploTaskRepository->updateEjemploTask($data, $EjemploTask);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function deleteEjemploTask($id)
    {
        try {
            $EjemploTask = $this->EjemploTaskRepository->getEjemploTaskById($id);
            $results = $this->EjemploTaskRepository->deleteEjemploTask($EjemploTask);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
