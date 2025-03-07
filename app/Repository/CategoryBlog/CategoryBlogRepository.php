<?php

namespace App\Repository\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;
use App\Interfaces\CategoryBlog\ICategoyBlogRepository;
use App\Models\CategoryBlog;

class CategoryBlogRepository implements ICategoyBlogRepository{
    public function getAllCategoryBlog()
    {
        return 'Get all category blog';
    }

    public function getCategoryBlogById($id)
    {
        return 'Get category blog by id';
    }

    public function createCategoryBlog( DTOsCategoryBlog $data)
    {
        $data = CategoryBlog::create([
            'name' => $data->getName(),
            'slug' => $data->getSlug(),
            'description' => $data->getDescription()
        ]);
        return $data;
    }

    public function updateCategoryBlog($data, $id)
    {
        return 'Update category blog';
    }

    public function deleteCategoryBlog($id)
    {
        return 'Delete category blog';
    }
}
