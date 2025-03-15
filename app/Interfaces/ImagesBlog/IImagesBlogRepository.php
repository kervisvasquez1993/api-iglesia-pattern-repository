<?php

namespace App\Interfaces\ImagesBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;
use App\Models\ImgBlog;

interface IImagesBlogRepository
{
    public function IndexImgBlog(array $data);
    public function CreateImagesBlog(DTOsImagesBlog $dTOssImagesBlog);
    public function findImgBlog(string $id): ImgBlog;

    public function deleteImgBlog(ImgBlog $imgBlog);
}
