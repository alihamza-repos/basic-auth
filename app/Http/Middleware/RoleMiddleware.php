<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect('/login');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user's role matches the required role
        if ($user->role !== $role) {
            // Redirect to an unauthorized page if the role doesn't match
            return redirect('/unauthorized');
        }

        // Proceed with the request
        return $next($request);
    }
}
