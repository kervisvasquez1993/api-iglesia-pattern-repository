<?php

namespace App\Repository\ImagesBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;
use App\Interfaces\ImagesBlog\IImagesBlogRepository;
use App\Models\ImgBlog;

class ImagesBlogRepository implements IImagesBlogRepository
{

    public function CreateImagesBlog(DTOsImagesBlog $DTOsImagesBlog)
    {
        $result = ImgBlog::create([
            'image' => $DTOsImagesBlog->getImage(),
            'blog_id' => $DTOsImagesBlog->getBlogId()
        ]);
        return $result;
    }
}
