<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (session('user_level') !== 'admin') {
            return redirect()->route('pengunjungindex'); // arahkan ke dashboard nasabah jika level bukan admin
        }
        return $next($request);
    }
}
