<?php

namespace App\Interfaces\Evento;

use App\DTOs\Evento\DTOsEvento;

interface IEventoServices 
{
    public function getAllEventos();
    public function getEventoById($id);
    public function createEvento(DTOsEvento $data);
    public function updateEvento(DTOsEvento $data, $id);
    public function deleteEvento($id);
}
