<?php

namespace App\Http\Controllers\Api\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBlog\CreateCategoryBlogRequest;
use App\Services\CategoryBlog\CategoryBlogServices;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{

    protected $categoryBlogServices;
    public function __construct(CategoryBlogServices $categoryBlogServices)
    {
        $this->categoryBlogServices = $categoryBlogServices;
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
    public function store(CreateCategoryBlogRequest $request)
    {
        $result = $this->categoryBlogServices->createCategoryBlog(DTOsCategoryBlog::fromRequest($request));
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
