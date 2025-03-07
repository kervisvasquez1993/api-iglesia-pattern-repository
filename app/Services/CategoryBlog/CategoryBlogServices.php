<?php

namespace App\Services\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;
use App\Interfaces\CategoryBlog\ICategoyBlogServices;
use App\Repository\CategoryBlog\CategoryBlogRepository;
use Exception;

class CategoryBlogServices implements ICategoyBlogServices
{
    protected $categoryBlogRepository;

    public function __construct(CategoryBlogRepository $categoryBlogRepository)
    {
        $this->categoryBlogRepository = $categoryBlogRepository;
    }

    public function getAllCategoryBlog()
    {
        return 'Get all category blog';
    }

    public function getCategoryBlogById($id)
    {
        return 'Get category blog by id';
    }

    public function createCategoryBlog(DTOsCategoryBlog $data)
    {
        try {
            $results = $this->categoryBlogRepository->createCategoryBlog($data);
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

    public function updateCategoryBlog(DTOsCategoryBlog $data, $id)
    {
        return 'Update category blog';
    }

    public function deleteCategoryBlog($id)
    {
        return 'Delete category blog';
    }
}
