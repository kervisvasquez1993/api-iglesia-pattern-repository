<?php

namespace App\DTOs\Sermones;

use App\Http\Requests\Sermones\CreateSermonesRequest;
use App\Http\Requests\Sermones\UpdateSermonesRequest;
use Illuminate\Support\Facades\Auth;

class DTOsSermones
{
    public function __construct(
        private readonly string $titulo,
        private readonly string $descripcion,
        private readonly string $url_youtube,
        private readonly bool $activo,
    ) {}

    public static function fromRequest(CreateSermonesRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            titulo: $validated['titulo'],
            descripcion: $validated['descripcion'],
            url_youtube: $validated['url_youtube'],
            activo: $validated['activo'] ?? true
        );
    }

    public static function fromUpdateRequest(UpdateSermonesRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            titulo: $validated['titulo'],
            descripcion: $validated['descripcion'],
            url_youtube: $validated['url_youtube'],
            activo: $validated['activo'] ?? true
        );
    }

    public function toArray(): array
    {
        return [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'url_youtube' => $this->url_youtube,
            'activo' => $this->activo
        ];
    }

    // Getter methods
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getUrlYoutube(): string
    {
        return $this->url_youtube;
    }

    public function getActivo(): bool
    {
        return $this->activo;
    }
}