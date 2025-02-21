<?php

namespace App\DTOs\Pages;


use Illuminate\Support\Str;
use App\Http\Requests\Page\CreatePageRequest;


class PagesDTO
{
    public function __construct(
        private readonly string $name,
        private readonly string $slug,
        private readonly string $description,
    ) {}

    public static function fromRequest(CreatePageRequest $request): self
    {
        $validated = $request->validated();
        $slug = self::generateSlug($validated['name']);

        return new self(
            name: $validated['name'],
            slug: $slug,
            description: $validated['description']
        );
    }

    private static function generateSlug(string $name): string
    {
        return Str::slug($name);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
