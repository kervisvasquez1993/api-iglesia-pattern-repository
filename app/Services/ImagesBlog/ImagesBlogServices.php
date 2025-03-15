<?php

namespace App\Services\ImagesBlog;

use App\DTOs\ImagesBlog\DTOsImagesBlog;
use App\Http\Requests\ImagesBlog\IndexImageBlogRequest;
use App\Interfaces\ImagesBlog\IImagesBlogServices;
use App\Repository\ImagesBlog\ImagesBlogRepository;
use App\Services\Auth\AuthServices;
use Exception;
use Illuminate\Http\Request;

class ImagesBlogServices implements IImagesBlogServices
{

    protected ImagesBlogRepository $imagesBlogRepository;
    protected $authRepository;

    public function __construct(ImagesBlogRepository $imagesBlogRepository, AuthServices $authRepository)
    {
        $this->imagesBlogRepository = $imagesBlogRepository;
        $this->authRepository = $authRepository;
    }

    public function indexImgsBlog(IndexImageBlogRequest $request)
    {
        $filters = $request->only(['blog_id']);
        try {
            $result = $this->imagesBlogRepository->IndexImgBlog($filters);
            return [
                'success' => true,
                'data' => $result,
                'message' => 'List Succeso'
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'data' => null,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function CreateImageBlog(DTOsImagesBlog $DTOsImagesBlog)
    {
        try {
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

    public function findImgBlog($id)
    {
        try {
            $result = $this->imagesBlogRepository->findImgBlog($id);

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

    public function deletedImageBlog($id)
    {
        try {
            $this->authRepository->validateRole();
            $imgBlog = $this->imagesBlogRepository->findImgBlog($id);
            $result = $this->imagesBlogRepository->deleteImgBlog($imgBlog);
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
