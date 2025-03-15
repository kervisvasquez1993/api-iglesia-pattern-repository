<?php

namespace App\DTOs\ImagesBlog;

use App\Http\Requests\ImagesBlog\CreateImageBlogRequest;
use App\Http\Requests\Page\CreatePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use Illuminate\Support\Facades\Storage;

class DTOsImagesBlog
{
    public function __construct(
        private readonly string $image,
        private readonly string $blog_id,
    ) {}
    

    public static function fromRequest(CreateImageBlogRequest $request): self
    {
        $validated = $request->validated();
        $imagePath = self::uploadImageToS3($request);
        return new self(
            image: $imagePath,
            blog_id: $validated['blog_id'],
        );
    }

    private static function uploadImageToS3(CreateImageBlogRequest $request): ?string
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = Storage::disk('s3')->putFile('blogs', $file);
            return "https://backend-imagen-br.s3.us-east-2.amazonaws.com/" . $path;
        }
        return null;
    }

    public static function fromUpdateRequest(CreateImageBlogRequest $request): self
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
