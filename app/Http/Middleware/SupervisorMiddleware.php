<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SupervisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): \Symfony\Component\HttpFoundation\Response  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
{
    if (!Auth::check()) {
        return redirect('/login');
    }

    /** @var User $user */
    $user = Auth::user();

    if (!$user->hasAnyRole(['Admin', 'Supervisor'])) {
        abort(403, 'Access denied.');
    }

    return $next($request);
}
}