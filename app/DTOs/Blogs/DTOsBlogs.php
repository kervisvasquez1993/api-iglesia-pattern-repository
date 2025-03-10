<?php

namespace App\DTOs\Blogs;

use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DTOsBlogs
{
    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly string $image,
        private readonly string $status,
        private readonly string $slug,
        private readonly string $content,
        private readonly string $category_id,
        private readonly string $user_id,
    ) {}

    public static function fromRequest(CreateBlogRequest $request): self
    {
        $validated = $request->validated();
        $slug = self::generateSlug($validated['title']);
        $imagePath = self::uploadImageToS3($request);

        return new self(
            name: $validated['title'],
            description: $validated['description'],
            image: $imagePath,
            status: $validated['status'],
            slug: $slug,
            content: $validated['content'],
            category_id: $validated['category_id'],
            user_id: Auth::id()
        );
    }
    private static function generateSlug(string $name): string
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (DB::table('blogs')->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
    private static function uploadImageToS3(CreateBlogRequest $request): ?string
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = Storage::disk('s3')->putFile('blogs', $file);
            return "https://backend-imagen-br.s3.us-east-2.amazonaws.com/" . $path;
        }
        return null;
    }
    public static function fromUpdateRequest(UpdateBlogRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            name: $validated['title'],
            description: $validated['description'],
            image: '',
            status: $validated['status'],
            slug: $validated['slug'],
            content: $validated['content'],
            category_id: $validated['category_id'],
            user_id: Auth::user()->id
        );
    }
    public function toArray(): array
    {
        return [
            'title' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'status' => $this->status,
            'slug' => $this->slug,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id
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

    public function getImage(): string
    {
        return $this->image;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCategoryId(): string
    {
        return $this->category_id;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }
}
