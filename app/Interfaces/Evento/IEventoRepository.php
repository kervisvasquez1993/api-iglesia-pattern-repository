<?php

namespace App\Interfaces\Evento;

use App\DTOs\Evento\DTOsEvento;
use App\Models\Evento;

interface IEventoRepository 
{
    public function getAllEventos();
    public function getEventoById($id): Evento;
    public function createEvento(DTOsEvento $data): Evento;
    public function updateEvento(DTOsEvento $data, Evento $Evento): Evento;
    public function deleteEvento(Evento $Evento): Evento;
}
