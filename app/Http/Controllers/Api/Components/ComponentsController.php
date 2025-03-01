<?php

namespace App\Http\Controllers\Api\Component;

use App\DTOs\Components\DTOsComponents;
use App\DTOs\Components\DTOsComponets;
use App\Http\Controllers\Controller;
use App\Http\Requests\Components\CreateComponentsRequest;
use App\Services\Components\ComponentsServices;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    protected ComponentsServices $componentsServices;

    public function __construct(ComponentsServices $componentsServices)
    {
        $this->componentsServices = $componentsServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateComponentsRequest $request)
    {


        $result = $this->componentsServices->create(DTOsComponents::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
