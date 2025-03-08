<?php

namespace App\Http\Controllers\Api\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBlog\CreateCategoryBlogRequest;
use App\Http\Requests\CategoryBlog\UpdateCategoryBlogRequest;
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
        $result = $this->categoryBlogServices->getAllCategoryBlog();
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], status: 200);
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
        $result = $this->categoryBlogServices->getCategoryBlogById($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], status: 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryBlogRequest $request, string $id)
    {
        $result = $this->categoryBlogServices->updateCategoryBlog(DTOsCategoryBlog::fromUpdateRequest($request), $id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], status: 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->categoryBlogServices->deleteCategoryBlog($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], status: 200);
    }
}
