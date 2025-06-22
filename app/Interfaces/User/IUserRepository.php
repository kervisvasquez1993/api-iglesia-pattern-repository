<?php

namespace App\Interfaces\User;

use App\DTOs\User\DTOsUser;
use App\Models\User;

interface IUserRepository 
{
    public function getAllUsers();
    public function getUserById($id): User;
    public function createUser(DTOsUser $data): User;
    public function updateUser(DTOsUser $data, User $User): User;
    public function deleteUser(User $User): User;
}
