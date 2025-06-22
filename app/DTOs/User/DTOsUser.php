<?php

namespace App\DTOs\User;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class DTOsUser 
{
    public function __construct(
        // Define your properties here
        // private readonly string $property1,
        // private readonly string $property2,
    ) {}
    
    public static function fromRequest(CreateUserRequest $request): self
    {
        $validated = $request->validated();
        
        return new self(
            // property1: $validated['property1'],
            // property2: $validated['property2'],
        );
    }
    
    public static function fromUpdateRequest(UpdateUserRequest $request): self
    {
        $validated = $request->validated();
        
        return new self(
            // property1: $validated['property1'],
            // property2: $validated['property2'],
        );
    }
    
    public function toArray(): array
    {
        return [
            // 'property1' => $this->property1,
            // 'property2' => $this->property2,
        ];
    }
    
    // Add getter methods for each property
    // public function getProperty1(): string
    // {
    //     return $this->property1;
    // }
}
