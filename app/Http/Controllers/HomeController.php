<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        // Gunakan config() agar lebih konsisten dengan .env
        $baseUrl = env('JAVA_API_URL');
        
        // Sesuaikan key session dengan yang di-set saat login
        $token = Session::get('user_token'); 

        try {
            // Ambil data hewan dari API Java
            $response = Http::withToken($token)->get("{$baseUrl}/animals");

            if ($response->successful()) {
                // Pastikan struktur JSON-nya sesuai (misal: { "data": [...] })
                $animals = $response->json()['data'] ?? $response->json();
            } else {
                Log::warning("Gagal ambil data hewan dari Java: " . $response->status());
                $animals = config('dummy_data.animals', []);
            }
        } catch (\Exception $e) {
            Log::error("Koneksi ke Java Gagal: " . $e->getMessage());
            $animals = config('dummy_data.animals', []);
        }

        // Pastikan path view-nya benar (sesuai folder resources/views/beranda/home/index.blade.php)
        return view('beranda.home.index', compact('animals'));
    }
}