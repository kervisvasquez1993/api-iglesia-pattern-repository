<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryBlog extends Model
{
    use SoftDeletes;
    protected $table = 'category_blogs';
    protected $fillable = ['name', 'slug', 'description', 'status', 'created_by', 'updated_by'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
