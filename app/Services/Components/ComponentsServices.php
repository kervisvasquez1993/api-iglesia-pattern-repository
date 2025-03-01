<?php

namespace App\Services\Components;

use App\DTOs\Components\DTOsComponents;
use App\Http\Requests\Components\CreateComponentsRequest;
use App\Interfaces\Components\IComponentsServices;
use App\Interfaces\Components\IComponentsRepository;

class ComponentsServices implements IComponentsServices
{
    protected IComponentsRepository $IComponentsRepository;

    public function __construct(IComponentsRepository $IComponentsRepository)
    {
        $this->IComponentsRepository = $IComponentsRepository;
    }
    public function findByName($name)
    {
        return $name;
    }
    public function create(DTOsComponents $data)
    {
        return $data;
    }
}
