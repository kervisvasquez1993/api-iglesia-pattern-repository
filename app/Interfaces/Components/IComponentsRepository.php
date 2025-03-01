<?php

namespace App\Interfaces\Components;

interface IComponentsRepository
{
    public function findById($id);
    public function findByName($name);

    public function create(array $data);
}
