<?php

namespace App\Http\Controllers\Api\ImageBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesBlog\CreateImageBlogRequest;
use App\Http\Requests\ImagesBlog\IndexImageBlogRequest;
use App\Services\ImagesBlog\ImagesBlogServices;
use Illuminate\Http\Request;

class ImageBlogController extends Controller
{

    protected ImagesBlogServices $imagesBlogServices;
    public function __construct(ImagesBlogServices $imagesBlogServices)
    {
        $this->imagesBlogServices = $imagesBlogServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(IndexImageBlogRequest $request)
    {
        $result = $this->imagesBlogServices->indexImgsBlog($request);
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
    public function store(CreateImageBlogRequest $request)
    {
        $result = $this->imagesBlogServices->CreateImageBlog(DTOsImagesBlog::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], status: 200);
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
