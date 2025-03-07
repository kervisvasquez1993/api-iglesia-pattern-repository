<?php

namespace App\Repository\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;
use App\Interfaces\CategoryBlog\ICategoyBlogRepository;
use App\Models\CategoryBlog;

class CategoryBlogRepository implements ICategoyBlogRepository
{
    public function getAllCategoryBlog()
    {
        return 'Get all category blog';
    }

    public function getCategoryBlogById($id)
    {
        $categoryBlog = CategoryBlog::find($id);
        if (!$categoryBlog) {
            throw new \Exception("No results found for Quiz with ID {$id}");
        }
        return $categoryBlog;
    }

    public function createCategoryBlog(DTOsCategoryBlog $data)
    {
        $data = CategoryBlog::create([
            'name' => $data->getName(),
            'slug' => $data->getSlug(),
            'description' => $data->getDescription()
        ]);
        return $data;
    }

    public function updateCategoryBlog($data, $categoryBlog)
    {
        $categoryBlog->update([
            'name' => $data->getName(),
            'slug' => $data->getSlug(),
            'description' => $data->getDescription()
        ]);
        return $categoryBlog;
    }

    public function deleteCategoryBlog($id)
    {
        return 'Delete category blog';
    }
}
