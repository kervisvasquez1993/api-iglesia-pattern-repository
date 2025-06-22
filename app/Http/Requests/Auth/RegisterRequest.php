<?php
namespace App\Http\Requests\Auth;

use App\Models\AdminToken;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $routeName = $this->route()->getName();
        
        // Para ruta register-admin (primer admin)
        if ($routeName === 'register.admin') {
            return !User::exists(); // Solo si no hay usuarios
        }
        
        // Para ruta register (usuarios normales)
        if ($routeName === 'register') {
            $user = auth('api')->user();
            return $user && $user->role === 'admin';
        }
        
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $routeName = $this->route()->getName();
        $isAdminRoute = $routeName === 'register.admin';
        
        $rules = [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ];

        // Solo para ruta de admin requiere token
        if ($isAdminRoute) {
            $rules['admin_token'] = [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $adminToken = AdminToken::findValidToken($value);
                    if (!$adminToken) {
                        $fail('Token de administrador inválido o ya utilizado.');
                    }
                }
            ];
        }

        return $rules;
    }

    protected function failedAuthorization()
    {
        $routeName = $this->route()->getName();
        
        if ($routeName === 'register.admin') {
            $message = 'El sistema ya tiene usuarios. Use la ruta de registro normal con autenticación.';
        } else {
            $message = 'Solo los administradores autenticados pueden crear usuarios.';
        }

        throw new HttpResponseException(response()->json([
            'message' => $message,
            'route_used' => $routeName,
            'system_status' => [
                'has_users' => User::exists(),
                'requires_admin_token' => !User::exists(),
                'requires_authentication' => User::exists()
            ]
        ], 403));
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}