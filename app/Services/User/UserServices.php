<?php

namespace App\Services\User;

use App\DTOs\User\DTOsUser;
use App\Interfaces\User\IUserServices;
use App\Repository\User\UserRepository;
use Exception;

class UserServices implements IUserServices 
{
    protected UserRepository $UserRepository;
    
    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    
    public function getAllUsers()
    {
        try {
            $results = $this->UserRepository->getAllUsers();
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function getUserById($id)
    {
        try {
            $results = $this->UserRepository->getUserById($id);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function createUser(DTOsUser $data)
    {
        try {
            $results = $this->UserRepository->createUser($data);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function updateUser(DTOsUser $data, $id)
    {
        try {
            $User = $this->UserRepository->getUserById($id);
            $results = $this->UserRepository->updateUser($data, $User);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function deleteUser($id)
    {
        try {
            $User = $this->UserRepository->getUserById($id);
            $results = $this->UserRepository->deleteUser($User);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
