<?php

namespace App\Interfaces\Blog;

use App\DTOs\Blogs\DTOsBlogs;
use App\Models\Blog;

interface IBlogRespository
{
    public function getBlog();
    public function getBlogById($id);
    public function createBlog(DTOsBlogs $data);
    public function updateBlog(DTOsBlogs $data, Blog $blog);
    public function deleteBlog(Blog $blog);
}
