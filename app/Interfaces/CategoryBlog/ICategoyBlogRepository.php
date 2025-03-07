<?php

namespace App\Interfaces\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;
use App\Models\CategoryBlog;

interface ICategoyBlogRepository
{
    public function getAllCategoryBlog();
    public function getCategoryBlogById($id);
    public function createCategoryBlog(DTOsCategoryBlog $data);
    public function updateCategoryBlog(DTOsCategoryBlog $data, CategoryBlog $categoryBlog);
    public function deleteCategoryBlog($id);
}
