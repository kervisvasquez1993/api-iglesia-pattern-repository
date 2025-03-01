<?php

namespace App\Interfaces\Components;

use App\DTOs\Components\DTOsComponents;

interface IComponentsRepository
{
    public function findById($id);
    public function findByName($name);

    public function create(DTOsComponents $data);
}
