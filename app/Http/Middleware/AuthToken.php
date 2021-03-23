<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\User;

class AuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $bearerToken = $request->bearerToken() ?? $request->get('token');
        if (!$bearerToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('token', $bearerToken)->first();
        if (!$user) {
            return response()->json(['error' => 'Not allowed']);
        }

        return $next($request);
    }
}
