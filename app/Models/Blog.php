<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'category_id', 'status'];

    public function category()
    {
        return $this->belongsTo(CategoryBlog::class, 'category_id');
    }

    // Generar slug automáticamente al crear/actualizar
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = static::generateUniqueSlug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title') && empty($blog->slug)) {
                $blog->slug = static::generateUniqueSlug($blog->title);
            }
        });
    }

    // Método para generar slug único
    private static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    // Método para obtener la URL del blog
    public function getUrlAttribute()
    {
        return route('showOneBlog', $this->slug);
    }
}
