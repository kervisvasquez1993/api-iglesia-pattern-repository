<?php

namespace App\Interfaces\Auth;

use App\DTOs\DTOsLogin;
use App\DTOs\DTOsRegister;
use App\Models\User;

interface IAuthRepository
{
    public function login(DTOsLogin $loginDTO);
    public function createAccessToken(User $user);
    public function createUser(DTOsRegister $registerDTO);
}
