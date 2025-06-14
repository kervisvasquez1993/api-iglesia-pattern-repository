<?php

namespace App\Interfaces\Sermones;

use App\DTOs\Sermones\DTOsSermones;

interface ISermonesServices 
{
    public function getAllSermoness();
    public function getSermonesById($id);
    public function createSermones(DTOsSermones $data);
    public function updateSermones(DTOsSermones $data, $id);
    public function deleteSermones($id);
}
