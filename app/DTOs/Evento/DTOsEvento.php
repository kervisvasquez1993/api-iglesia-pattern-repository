<?php

namespace App\DTOs\Evento;

use App\Http\Requests\Evento\CreateEventoRequest;
use App\Http\Requests\Evento\UpdateEventoRequest;
use Illuminate\Support\Facades\Auth;

class DTOsEvento 
{
    public function __construct(
        // Define your properties here
        // private readonly string $property1,
        // private readonly string $property2,
    ) {}
    
    public static function fromRequest(CreateEventoRequest $request): self
    {
        $validated = $request->validated();
        
        return new self(
            // property1: $validated['property1'],
            // property2: $validated['property2'],
        );
    }
    
    public static function fromUpdateRequest(UpdateEventoRequest $request): self
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
