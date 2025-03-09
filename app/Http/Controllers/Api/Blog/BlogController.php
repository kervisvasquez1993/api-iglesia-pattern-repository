<?php

namespace App\Http\Controllers\Api\Blog;

use App\DTOs\Blogs\DTOsBlogs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Services\Blogs\BlogsServices;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    
    protected BlogsServices $blogsServices;

    public function __construct(BlogsServices $blogsServices)
    {
        $this->blogsServices = $blogsServices;
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
    public function store(CreateBlogRequest $request)
    {

        $result = $this->blogsServices->createBlog(DTOsBlogs::fromRequest($request));
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
        $result = $this->blogsServices->getBlogById($id);
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
