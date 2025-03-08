<?php

namespace App\Repository\Auth;


use App\DTOs\Auth\DTOsLogin;
use App\DTOs\Auth\DTOsRegister;
use App\Interfaces\Auth\IAuthRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthRepository implements IAuthRepository
{

    public function login(DTOsLogin $loginDTO)
    {
        if (!Auth::attempt($loginDTO->credentials())) {
            return [
                'success' => false
            ];
        }
        return [
            'success' => true,
            'user' => Auth::user()
        ];
    }
    public function createAccessToken(User $user): array
    {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();

        return [
            'access_token' => $tokenResult->accessToken
        ];
    }
    public function createUser(DTOsRegister $registerDTO): User
    {
        return User::create([
            'username' => $registerDTO->getUsername(),
            'email' => $registerDTO->getEmail(),
            'password' => Hash::make($registerDTO->getPassword()),
            'role' => $registerDTO->getRole()
        ]);
    }
    
}
