<?php

namespace App\Http\Controllers\Api\Sermones;

use App\DTOs\Sermones\DTOsSermones;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sermones\CreateSermonesRequest;
use App\Http\Requests\Sermones\UpdateSermonesRequest;
use App\Services\Sermones\SermonesServices;
use Illuminate\Http\Request;

class SermonesController extends Controller 
{
    protected SermonesServices $SermonesServices;
    
    public function __construct(SermonesServices $SermonesServices)
    {
        $this->SermonesServices = $SermonesServices;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->SermonesServices->getAllSermoness();
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
    public function store(CreateSermonesRequest $request)
    {
        $result = $this->SermonesServices->createSermones(DTOsSermones::fromRequest($request));
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
        $result = $this->SermonesServices->getSermonesById($id);
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
    public function update(UpdateSermonesRequest $request, string $id)
    {
        $result = $this->SermonesServices->updateSermones(DTOsSermones::fromUpdateRequest($request), $id);
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
        $result = $this->SermonesServices->deleteSermones($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
