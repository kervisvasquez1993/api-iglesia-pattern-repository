<?php

namespace App\Services\Components;

use App\DTOs\Components\DTOsComponents;
use App\Http\Requests\Components\CreateComponentsRequest;
use App\Interfaces\Components\IComponentsServices;
use App\Interfaces\Components\IComponentsRepository;
use ComponentsRespository;
use Exception;

class ComponentsServices implements IComponentsServices
{
    protected ComponentsRespository $ComponentsRepository;

    public function __construct(ComponentsRespository $ComponentsRepository)
    {
        $this->ComponentsRepository = $ComponentsRepository;
    }
    public function findByName($name)
    {
        return $name;
    }
    public function create(DTOsComponents $data)
    {

        try {

            $result = $this->ComponentsRepository->create($data);
            return [
                'success' => true,
                'data' =>  $result
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
