<?php

namespace App\Interfaces\Components;

use App\DTOs\Components\DTOsComponents;
use App\Http\Requests\Components\CreateComponentsRequest;

interface IComponentsServices
{
    public function findByName($name);

    public function create(DTOsComponents $data);
}
