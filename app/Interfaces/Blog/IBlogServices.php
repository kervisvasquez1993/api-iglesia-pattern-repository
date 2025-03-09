<?php

namespace App\Interfaces\Blog;

use App\DTOs\Blogs\DTOsBlogs;

interface IBlogServices
{
    public function getBlog();
    public function getBlogById($id);
    public function createBlog(DTOsBlogs $data);
    public function updateBlog(DTOsBlogs $data, $id);
    public function deleteBlog($id);
}
