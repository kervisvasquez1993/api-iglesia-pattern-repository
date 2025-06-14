<?php

namespace App\Interfaces\Sermones;

use App\DTOs\Sermones\DTOsSermones;
use App\Models\Sermones;

interface ISermonesRepository 
{
    public function getAllSermoness();
    public function getSermonesById($id): Sermones;
    public function createSermones(DTOsSermones $data): Sermones;
    public function updateSermones(DTOsSermones $data, Sermones $Sermones): Sermones;
    public function deleteSermones(Sermones $Sermones): Sermones;
}
