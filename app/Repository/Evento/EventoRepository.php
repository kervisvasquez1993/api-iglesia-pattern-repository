<?php

namespace App\Repository\Evento;

use App\DTOs\Evento\DTOsEvento;
use App\Interfaces\Evento\IEventoRepository;
use App\Models\Evento;

class EventoRepository implements IEventoRepository 
{
    public function getAllEventos()
    {
        $Eventos = Evento::all();
        return $Eventos;
    }
    
    public function getEventoById($id): Evento
    {
        $Evento = Evento::where('id', $id)->first();
        if (!$Evento) {
            throw new \Exception("No results found for Evento with ID {$id}");
        }
        return $Evento;
    }
    
    public function createEvento(DTOsEvento $data): Evento
    {
        $result = Evento::create($data->toArray());
        return $result;
    }
    
    public function updateEvento(DTOsEvento $data, Evento $Evento): Evento
    {
        $Evento->update($data->toArray());
        return $Evento;
    }
    
    public function deleteEvento(Evento $Evento): Evento
    {
        $Evento->delete();
        return $Evento;
    }
        public function updateEventoStatus(Evento $evento, string $status): Evento
    {
        $evento->update(['status' => $status]);
        return $evento->fresh(); // Recargar desde la base de datos
    }

}
