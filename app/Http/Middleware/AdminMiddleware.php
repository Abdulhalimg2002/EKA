<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        // ممكن ترجع إلى صفحة login إذا المستخدم غير مصادق عليه
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        return redirect('/')->with('error', 'Unauthorized Access');
    }
}
