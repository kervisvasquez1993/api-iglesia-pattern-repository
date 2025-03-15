<?php

namespace App\Interfaces\ImagesBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;
use App\Http\Requests\ImagesBlog\IndexImageBlogRequest;
use Illuminate\Http\Request;

interface IImagesBlogServices
{

    public function indexImgsBlog(IndexImageBlogRequest $request);
    public function CreateImageBlog(DTOsImagesBlog $dTOsImagesBlog);

    public function findImgBlog(string $id);
    public function deletedImageBlog(string $id);
}
