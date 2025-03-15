<?php

namespace App\Services\ImagesBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;
use App\Interfaces\ImagesBlog\IImagesBlogServices;
use App\Repository\ImagesBlog\ImagesBlogRepository;
use Exception;

class ImagesBlogServices implements IImagesBlogServices
{

    protected ImagesBlogRepository $imagesBlogRepository;

    public function __construct(ImagesBlogRepository $imagesBlogRepository)
    {
        $this->imagesBlogRepository = $imagesBlogRepository;
    }

    public function CreateImageBlog(DTOsImagesBlog $DTOsImagesBlog)
    {
        try {
            // $results = $this->categoryBlogRepository->createCategoryBlog($data);
            $result = $this->imagesBlogRepository->CreateImagesBlog($DTOsImagesBlog);

            return [
                'success' => true,
                'data' => $result,
                'message' => 'Create Succeso'
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'data' => null,
                'message' => $exception->getMessage()
            ];
        }
    }
}
