<?php

namespace App\Repository\Blogs;

use App\DTOs\Blogs\DTOsBlogs;
use App\Interfaces\Blog\IBlogRespository;
use App\Models\Blog;

class BlogsRespository implements IBlogRespository
{
    public function getBlog()
    {
        // Implement getBlog method
    }

    public function getBlogById($id)
    {
        // Implement getBlogById method
    }

    public function createBlog(DTOsBlogs $data)
    {
        $result = Blog::create([
            'title' => $data->getName(),
            'slug' => $data->getSlug(),
            'description' => $data->getDescription(),
            'image' => $data->getImage(),
            'content' => $data->getContent(),
            'category_id' => $data->getCategoryId(),
            'user_id' => $data->getUserId(),
        ]);
        return $result;
    }



    public function updateBlog($data, $id)
    {
        // Implement updateBlog method
    }

    public function deleteBlog($id)
    {
        // Implement deleteBlog method
    }
}
