<?php

namespace App\DTOs\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class DTOsRegister
{
    public function __construct(
    private readonly string $username,
    private readonly string $email,
    private readonly string $password,
    private readonly string $role = 'user',
    private readonly ?string $adminToken = null
) {}


    public static function fromRequest(RegisterRequest $request, bool $isAdminRegistration = false): self
    {
        return new self(
            username: $request->validated('username'),
            email: $request->validated('email'),
            password: $request->validated('password'),
            role: $isAdminRegistration ? 'admin' : 'user',
            adminToken: $request->validated('admin_token') ?? null
        );
    }



    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role
        ];
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function getAdminToken(): ?string
{
    return $this->adminToken;
}

}