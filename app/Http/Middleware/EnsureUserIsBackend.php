<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsBackend
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user() instanceof \App\Models\User) {
            return response()->json(['message' => 'Acceso no autorizado'], 403);
        }

        return $next($request);
    }
}
