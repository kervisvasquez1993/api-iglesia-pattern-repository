<?php

namespace App\DTOs\CategoryBlog;

use App\Http\Requests\CategoryBlog\CreateCategoryBlogRequest;
use App\Http\Requests\CategoryBlog\UpdateCategoryBlogRequest;
use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use Illuminate\Support\Str;

class DTOsCategoryBlog
{
    public function __construct(
        private readonly string $name,
        private readonly string $slug,
        private readonly string $description

    ) {}

    private static function generateSlug(string $name): string
    {
        return Str::slug($name);
    }
    public static function fromRequest(CreateCategoryBlogRequest $request): self
    {
        $validated = $request->validated();
        $slug = self::generateSlug($validated['name']);
        return new self(
            name: $validated['name'],
            slug: $slug,
            description: $validated['description']
        );
    }

    public static function fromUpdateRequest(UpdateCategoryBlogRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            name: $validated['name'],
            slug: $validated['slug'],
            description: $validated['description']

        );
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
