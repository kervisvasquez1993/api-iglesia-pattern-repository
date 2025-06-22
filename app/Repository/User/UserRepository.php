<?php

namespace App\Repository\User;

use App\DTOs\User\DTOsUser;
use App\Interfaces\User\IUserRepository;
use App\Models\User;

class UserRepository implements IUserRepository 
{
    public function getAllUsers()
    {
        $Users = User::all();
        return $Users;
    }
    
    public function getUserById($id): User
    {
        $User = User::where('id', $id)->first();
        if (!$User) {
            throw new \Exception("No results found for User with ID {$id}");
        }
        return $User;
    }
    
    public function createUser(DTOsUser $data): User
    {
        $result = User::create($data->toArray());
        return $result;
    }
    
    public function updateUser(DTOsUser $data, User $User): User
    {
        $User->update($data->toArray());
        return $User;
    }
    
    public function deleteUser(User $User): User
    {
        $User->delete();
        return $User;
    }
}
