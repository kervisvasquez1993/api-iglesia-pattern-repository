<?php

use App\DTOs\Components\DTOsComponents;
use App\Interfaces\Components\IComponentsRepository;
use App\Models\Component;

class ComponentsRespository implements IComponentsRepository
{

    public function create(DTOsComponents $data)
    {
        $data = Component::create([
            "name" => $data->getName(),
            "type" => $data->getType(),
            "config" => $data->getConfig(),
        ]);
    }

    public function findById($id)
    {
        // Implementation here
    }

    public function findByName($name)
    {
        // Implementation here
    }
}
