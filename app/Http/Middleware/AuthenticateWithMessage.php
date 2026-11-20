<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithMessage
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()
                ->route('home')
                ->with(
                    'error',
                    'Для выполнения этого действия необходимо войти в аккаунт.'
                );
        }

        return $next($request);
    }
}
