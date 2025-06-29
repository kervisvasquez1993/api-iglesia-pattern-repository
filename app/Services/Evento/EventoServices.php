<?php

namespace App\Services\Evento;

use App\DTOs\Evento\DTOsEvento;
use App\Interfaces\Evento\IEventoServices;
use App\Repository\Evento\EventoRepository;
use Exception;

class EventoServices implements IEventoServices 
{
    protected EventoRepository $EventoRepository;
    
    public function __construct(EventoRepository $EventoRepository)
    {
        $this->EventoRepository = $EventoRepository;
    }
    
    public function getAllEventos()
    {
        try {
            $results = $this->EventoRepository->getAllEventos();
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
    
    public function getEventoById($id)
    {
        try {
            $results = $this->EventoRepository->getEventoById($id);
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
    
    public function createEvento(DTOsEvento $data)
    {
        try {
            $results = $this->EventoRepository->createEvento($data);
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
    
    public function updateEvento(DTOsEvento $data, $id)
    {
        try {
            $Evento = $this->EventoRepository->getEventoById($id);
            $results = $this->EventoRepository->updateEvento($data, $Evento);
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
    
    public function deleteEvento($id)
    {
        try {
            $Evento = $this->EventoRepository->getEventoById($id);
            $results = $this->EventoRepository->deleteEvento($Evento);
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
        public function updateEventoStatus($id, $status)
    {
        try {
            $evento = $this->EventoRepository->getEventoById($id);
            $result = $this->EventoRepository->updateEventoStatus($evento, $status);
            
            return [
                'success' => true,
                'data' => $result
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

}
