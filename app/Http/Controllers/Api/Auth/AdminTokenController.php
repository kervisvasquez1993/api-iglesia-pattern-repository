<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminToken;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminTokenController extends Controller
{
    /**
     * Obtener token de administrador para el primer registro
     * Solo disponible cuando no hay usuarios en el sistema
     */
    public function getAdminToken(): JsonResponse
    {
        try {
            // Verificar si ya existen usuarios en el sistema
            if (User::exists()) {
                return response()->json([
                    'message' => 'El sistema ya tiene usuarios registrados. No se requiere token de administrador.',
                    'requires_token' => false
                ], 400);
            }

            // Verificar si ya existe un token válido
            $existingToken = AdminToken::whereNull('used_at')->first();
            
            if ($existingToken) {
                // Devolver el token existente
                return response()->json([
                    'message' => 'Token de administrador disponible',
                    'token' => $existingToken->token,
                    'requires_token' => true,
                    'system_status' => $this->getSystemStatus()
                ], 200);
            }

            // Generar nuevo token si no existe uno válido
            $tokenString = AdminToken::generateToken();
            
            $adminToken = AdminToken::create([
                'token' => $tokenString
            ]);

            return response()->json([
                'message' => 'Token de administrador generado exitosamente',
                'token' => $adminToken->token,
                'requires_token' => true,
                'system_status' => $this->getSystemStatus()
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al generar token de administrador',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function getSystemStatus(): JsonResponse
    {
        $status = $this->systemStatus();
        
        return response()->json([
            'system_status' => $status
        ], 200);
    }

    /**
     * Validar si un token es válido
     */
    public function validateToken(Request $request): JsonResponse
{
    try {
        // Validar que se envíe el token
        $request->validate([
            'token' => 'required|string'
        ]);

        $token = $request->input('token');
        $adminToken = AdminToken::findValidToken($token);
        
        if (!$adminToken) {
            return response()->json([
                'valid' => false,
                'message' => 'Token inválido o ya utilizado'
            ], 400);
        }

        return response()->json([
            'valid' => true,
            'message' => 'Token válido',
            'token_info' => [
                'created_at' => $adminToken->created_at,
                'is_used' => !is_null($adminToken->used_at)
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error al validar token',
            'error' => $e->getMessage()
        ], 500);
    }
}
    /**
     * Obtener información del estado del sistema
     */
    private function systemStatus(): array
    {
        return [
            'has_users' => User::exists(),
            'has_admin' => User::where('role', 'admin')->exists(),
            'requires_admin_token' => !User::exists(),
            'has_valid_token' => AdminToken::hasValidToken(),
            'total_users' => User::count(),
            'total_admins' => User::where('role', 'admin')->count()
        ];
    }

}