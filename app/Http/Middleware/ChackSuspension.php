<?php

// app/Http/Middleware/CheckSuspension.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ChackSuspension
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Se o usuário estiver suspenso, desconectar e redirecionar
            if ($user->is_suspended) {
                Auth::logout();  // Desconecta o usuário
                return redirect('/login')->with('error', 'Sua conta foi suspensa.');
            }
        }

        return $next($request);
    }
}

