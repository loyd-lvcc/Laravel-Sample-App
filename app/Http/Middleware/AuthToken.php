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
        $token = $request->get('token');
        $user = User::where('token', $token)->first();
        if (!$user) {
            // return response()->json(['error' => 'Not allowed']);
            abort(401, 'Unauthorized');
        }

        return $next($request);
    }
}
