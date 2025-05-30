<?php

namespace App\Repository\Blogs;

use App\DTOs\Blogs\DTOsBlogs;
use App\Interfaces\Blog\IBlogRespository;
use App\Models\Blog;

class BlogsRespository implements IBlogRespository
{
    public function getBlog()
    {
        $blogs = Blog::all();
        return $blogs;
    }

    public function getBlogById($id): Blog
    {
        $blog = Blog::where('id', $id)->first();
        if (!$blog) {
            throw new \Exception("No results found for Blog with ID {$id}");
        }
        return $blog;
    }

 public function createBlog(DTOsBlogs $data): Blog
{
    $result = Blog::create([
        'title' => $data->getName(),
        'description' => $data->getDescription(),
        'image' => $data->getImage(),
        'content' => $data->getContent(),
        'slug' => $data->getSlug(),          
        'status' => $data->getStatus(),      
        'category_id' => $data->getCategoryId(),
        'user_id' => $data->getUserId(),
    ]);
    return $result;
}



    public function updateBlog(DTOsBlogs $data, Blog $blog): Blog
    {
        $blog->update([
            'title' => $data->getName(),
            'slug' => $data->getSlug(),
            'description' => $data->getDescription(),
            'content' => $data->getContent(),
            'category_id' => $data->getCategoryId(),
            'user_id' => $data->getUserId(),
        ]);
        return $blog;
    }

    public function deleteBlog(Blog $blog): Blog
    {
        $blog->delete();
        return $blog;
    }
}
