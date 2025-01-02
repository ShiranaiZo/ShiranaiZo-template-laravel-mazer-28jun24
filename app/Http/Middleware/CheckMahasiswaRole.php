<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMahasiswaRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login dan memiliki role 'mahasiswa'
        if (auth()->check() && auth()->user()->role === 'mahasiswa') {
            return $next($request);
        }

        // Redirect jika bukan mahasiswa
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses.');
    }
}
