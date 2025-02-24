<?php

namespace App\Http\Controllers\Api\Pages;

use App\DTOs\Pages\PagesDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\CreatePageRequest;
use App\Models\Page;
use App\Services\Pages\PagesServices;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    protected $pagesServices;
    public function __construct(PagesServices $pagesServices)
    {
        $this->pagesServices = $pagesServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = $this->pagesServices->showAllPages();
        return response()->json($pages['data'], status: 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePageRequest $request)
    {

        $result = $this->pagesServices->create(PagesDTO::fromRequest($request));
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
    public function show(string $page)
    {
        $result = $this->pagesServices->showOne($page);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], status: 201);
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
