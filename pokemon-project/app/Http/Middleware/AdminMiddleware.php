<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar se o usuário está autenticado
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Verificar se o usuário tem role de admin
        if (!isset($user->role) || $user->role !== 'admin') {
            abort(403, 'Acesso negado. Apenas administradores podem acessar esta página.');
        }

        return $next($request);
    }
}