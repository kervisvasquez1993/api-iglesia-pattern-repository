<?php

namespace App\DTOs\Components;


use App\Http\Requests\Components\CreateComponentsRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Http\Requests\Page\CreatePageRequest;


class  DTOsComponents
{
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly array $config,

    ) {}

    public static function fromRequest(CreateComponentsRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            name: $validated['name'],
            type: $validated['type'],
            config: $request->config,
        );
    }

    public static function fromUpdateRequest(CreateComponentsRequest $request): self
    {
        $validated = $request->validated();
        return new self(
            name: $validated['name'],
            type: $validated['type'],
            config: $request->config,
        );
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'config' => $this->config,

        ];
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getConfig(): array
    {
        return $this->config;
    }
}
