<?php

namespace App\Interfaces\CategoryBlog;

use App\DTOs\CategoryBlog\DTOsCategoryBlog;

interface ICategoyBlogRepository
{
    public function getAllCategoryBlog();
    public function getCategoryBlogById($id);
    public function createCategoryBlog(DTOsCategoryBlog $data);
    public function updateCategoryBlog(DTOsCategoryBlog $data, $id);
    public function deleteCategoryBlog($id);
}
