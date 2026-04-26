<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckShelterStatus
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Cek apakah user sudah login (berdasarkan session 'is_logged_in')
        if (!Session::get('is_logged_in')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Ambil status shelter dari session (sesuai yang di-set di AuthController)
        $statusShelter = Session::get('statusShelter');

        // 3. Jika statusShelter false atau tidak ada, lempar ke halaman buat shelter
        if (!$statusShelter) {
            return redirect()->route('buat_shelter')
                ->with('info', 'Langkah terakhir! Silakan daftarkan shelter kamu dulu.');
        }

        return $next($request);
    }
}