<?php

namespace App\Interfaces\User;

use App\DTOs\User\DTOsUser;

interface IUserServices 
{
    public function getAllUsers();
    public function getUserById($id);
    public function createUser(DTOsUser $data);
    public function updateUser(DTOsUser $data, $id);
    public function deleteUser($id);
}
