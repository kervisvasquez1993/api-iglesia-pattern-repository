<?php

namespace App\Http\Controllers\Api\Evento;

use App\DTOs\Evento\DTOsEvento;
use App\Http\Controllers\Controller;
use App\Http\Requests\Evento\CreateEventoRequest;
use App\Http\Requests\Evento\UpdateEventoRequest;
use App\Services\Evento\EventoServices;
use Illuminate\Http\Request;

class EventoController extends Controller 
{
    protected EventoServices $EventoServices;
    
    public function __construct(EventoServices $EventoServices)
    {
        $this->EventoServices = $EventoServices;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->EventoServices->getAllEventos();
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventoRequest $request)
    {
        $result = $this->EventoServices->createEvento(DTOsEvento::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 201);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->EventoServices->getEventoById($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, string $id)
    {
        $result = $this->EventoServices->updateEvento(DTOsEvento::fromUpdateRequest($request), $id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->EventoServices->deleteEvento($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
