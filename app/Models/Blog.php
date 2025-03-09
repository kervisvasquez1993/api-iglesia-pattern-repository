<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $table = 'blogs';
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'category_id', 'status'];

    public function category()
    {
        return $this->belongsTo(CategoryBlog::class, 'category_id');
    }
}
