<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->user() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        return redirect('/home'); // Sesuaikan dengan rute yang ingin Anda gunakan
    }
}
