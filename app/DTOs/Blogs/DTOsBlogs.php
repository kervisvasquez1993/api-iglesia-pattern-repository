<?php

namespace App\DTOs\Blogs;

use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;

class DTOsBlogs
{
    public function __construct(
        private readonly string $name
    ) {}

    public static function fromRequest(CreatePageRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            name: $validated['name'],
        );
    }

    public static function fromUpdateRequest(UpdatePageRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            name: $validated['name'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
}
