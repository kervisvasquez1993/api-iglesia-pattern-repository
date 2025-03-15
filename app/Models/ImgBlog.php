<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgBlog extends Model
{
    
    protected $table = 'img_blogs';
    protected $fillable = ['id', 'blog_id', 'image'];
   
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'id_blog', 'id');
    }
}
