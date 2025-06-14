<?php

namespace App\Repository\Sermones;

use App\DTOs\Sermones\DTOsSermones;
use App\Interfaces\Sermones\ISermonesRepository;
use App\Models\Sermones;

class SermonesRepository implements ISermonesRepository 
{
    public function getAllSermoness()
    {
        $Sermoness = Sermones::all();
        return $Sermoness;
    }
    
    public function getSermonesById($id): Sermones
    {
        $Sermones = Sermones::where('id', $id)->first();
        if (!$Sermones) {
            throw new \Exception("No results found for Sermones with ID {$id}");
        }
        return $Sermones;
    }
    
    public function createSermones(DTOsSermones $data): Sermones
    {
        $result = Sermones::create($data->toArray());
        return $result;
    }
    
    public function updateSermones(DTOsSermones $data, Sermones $Sermones): Sermones
    {
        $Sermones->update($data->toArray());
        return $Sermones;
    }
    
    public function deleteSermones(Sermones $Sermones): Sermones
    {
        $Sermones->delete();
        return $Sermones;
    }
}
