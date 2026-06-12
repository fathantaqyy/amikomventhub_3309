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
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah user sudah login DAN memiliki role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Izinkan akses melanjut ke halaman tujuan
        }

        // 2. Jika tidak sesuai, tolak akses dan tendang kembali ke halaman login
        return redirect()->route('admin.login')->with('error', 'Akses ditolak! Anda harus login sebagai admin untuk masuk ke halaman ini.');
    }
}