<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthService
{
    /**
     * Handle login logic and return token.
     */
    public function login(array $credentials)
    {
        // Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Obter usuário autenticado
            $user = Auth::user();
            
            // Gerar um token de API (usando Sanctum)
            $token = $user->createToken('API Token')->plainTextToken;

            return $token;
        }

        return null; // Retorna nulo caso as credenciais sejam inválidas
    }
}
