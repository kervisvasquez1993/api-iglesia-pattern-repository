<?php

namespace App\Services\Auth;


use App\DTOs\Auth\DTOsLogin;
use App\DTOs\Auth\DTOsRegister;
use App\Interfaces\Auth\IAuthRepository;
use App\Models\AdminToken;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use Exception;


class AuthServices
{
    protected IAuthRepository $authRepository;

    public function __construct(IAuthRepository $authRepositoryInterface)
    {
        $this->authRepository = $authRepositoryInterface;
    }

    public function login(DTOsLogin $loginDTO)
    {
        try {
            $authResult = $this->authRepository->login($loginDTO);

            if (!$authResult['success']) {
                return [
                    'success' => false,
                    'message' => 'The provided data is incorrect'
                ];
            }
            $user = $authResult['user'];
            $tokenResult = $this->authRepository->createAccessToken($user);

            return [
                'success' => true,
                'data' => [
                    'access_token' => $tokenResult['access_token'],
                    'data' => $user
                ]
            ];
        } catch (Exception $ex) {
            return [
                'success' => false,
                'message' => $ex->getMessage()
            ];
        }
    }

public function register(DTOsRegister $registerDTO)
{
    try {
        $isFirstUser = $registerDTO->getRole() === 'admin';
        
        // Si es primer admin, validar token
        if ($isFirstUser) {
            if (!$registerDTO->getAdminToken()) {
                throw new Exception('Se requiere token de administrador para crear el primer admin');
            }
            
            $adminToken = AdminToken::findValidToken($registerDTO->getAdminToken());
            if (!$adminToken) {
                throw new Exception('Token de administrador inválido o ya utilizado');
            }
        }
        
        $user = $this->authRepository->createUser($registerDTO);
        
        // Marcar token como usado si es primer admin
        if ($isFirstUser && isset($adminToken)) {
            $adminToken->markAsUsed($user->email);
        }
        
        return [
            'success' => true,
            'data' => [
                'user' => $user,
                'message' => $isFirstUser 
                    ? 'Primer administrador creado exitosamente' 
                    : 'Usuario creado exitosamente',
                'is_first_admin' => $isFirstUser
            ]
        ];
        
    } catch (Exception $exception) {
        return [
            'success' => false,
            'message' => $exception->getMessage()
        ];
    }
}
    public function validateRole()
    {
        if (!Gate::allows('validate-role', Auth::user())) {
            throw new \Exception("You do not have permission to perform this action.");
        }
    }
}
