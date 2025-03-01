<?php

namespace App\Interfaces\Components;

interface IComponentsServices
{
    public function findByName($name);

    public function create(array $data);
}
