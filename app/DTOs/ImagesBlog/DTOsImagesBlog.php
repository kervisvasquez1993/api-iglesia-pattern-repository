<?php

namespace App\DTOs\ImagesBlog;

use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;

class DTOsImagesBlog
{
    public function __construct(
        private readonly string $image,
        private readonly string $blog_id,
    ) {}

    public static function fromRequest(CreatePageRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            image: $validated['image'],
            blog_id: $validated['blog_id'],
        );
    }

    public static function fromUpdateRequest(UpdatePageRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            image: $validated['image'],
            blog_id: $validated['blog_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'image' => $this->image,
            'blog_id' => $this->blog_id,
        ];
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getBlogId(): string
    {
        return $this->blog_id;
    }
}
