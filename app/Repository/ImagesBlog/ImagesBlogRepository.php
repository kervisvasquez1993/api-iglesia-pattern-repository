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

    public function IndexImgBlog(array $filters)
    {
        $query = ImgBlog::query();

        if (!empty($filters['blog_id'])) {
            $query->where('blog_id', $filters['blog_id']);
        }

        return $query->get();
    }
}
