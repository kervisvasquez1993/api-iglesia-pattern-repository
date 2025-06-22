<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'used_at',
        'used_by_email'
    ];

    protected $dates = [
        'used_at'
    ];

    /**
     * Verificar si el token es válido y no ha sido usado
     */
    public function isValid(): bool
    {
        return is_null($this->used_at);
    }

    /**
     * Marcar el token como usado
     */
    public function markAsUsed(string $email): void
    {
        $this->update([
            'used_at' => now(),
            'used_by_email' => $email
        ]);
    }

    /**
     * Generar un nuevo token único
     */
    public static function generateToken(): string
    {
        return 'admin_' . bin2hex(random_bytes(16)) . '_' . time();
    }

    /**
     * Verificar si existe un token válido
     */
    public static function hasValidToken(): bool
    {
        return self::whereNull('used_at')->exists();
    }

    /**
     * Obtener token válido por string
     */
    public static function findValidToken(string $token): ?self
    {
        return self::where('token', $token)
                   ->whereNull('used_at')
                   ->first();
    }
}