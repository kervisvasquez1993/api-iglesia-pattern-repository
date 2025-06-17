<?php

namespace App\Services\Blogs;

use App\DTOs\Blogs\DTOsBlogs;
use App\Interfaces\Blog\IBlogServices;
use App\Repository\Blogs\BlogsRespository;
use Exception;


class BlogsServices implements IBlogServices
{

    protected  BlogsRespository $blogRepository;


    public function __construct(BlogsRespository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function getBlog()
    {
        try {
            $results = $this->blogRepository->getBlog();
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function getBlogById($id)
    {
        try {
            $results = $this->blogRepository->getBlogById($id);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
     public function getBlogBySlug($slug)
    {
        try {
            $results = $this->blogRepository->getBlogBySlug($slug);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function createBlog(DTOsBlogs $data)
    {
        try {
            $results = $this->blogRepository->createBlog($data);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function updateBlog(DTOsBlogs $data, $id)
    {
        try {
            $blog = $this->blogRepository->getBlogById($id);
            $results = $this->blogRepository->updateBlog($data, $blog);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function deleteBlog($id)
    {
        try {
            $blog = $this->blogRepository->getBlogById($id);
            $results = $this->blogRepository->deleteBlog($blog);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
