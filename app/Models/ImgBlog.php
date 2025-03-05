<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgBlog extends Model
{
    
    protected $table = 'img_blog';
    protected $fillable = ['id', 'id_blog', 'img'];
    public $timestamps = false;
    
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'id_blog', 'id');
    }
}
