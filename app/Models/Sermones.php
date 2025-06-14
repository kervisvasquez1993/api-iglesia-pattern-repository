<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sermones extends Model
{
    use HasFactory;

    protected $table = 'sermones';

    protected $fillable = [
        'titulo',
        'descripcion',
        'url_youtube',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scopes para filtrar por estado
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeInactivos($query)
    {
        return $query->where('activo', false);
    }

    // Método para extraer el ID del video de YouTube
    public function getYoutubeVideoId(): ?string
    {
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $this->url_youtube, $matches)) {
            return $matches[1];
        }
        return null;
    }

    // Método para generar URL de embed
    public function getYoutubeEmbedUrl(): ?string
    {
        $videoId = $this->getYoutubeVideoId();
        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }

    // Método para generar URL de thumbnail
    public function getYoutubeThumbnail(): ?string
    {
        $videoId = $this->getYoutubeVideoId();
        return $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : null;
    }
}