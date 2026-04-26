<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $baseUrl = env('JAVA_API_URL');
        $token = Session::get('user_token'); 

        try {
            /** * PENYESUAIAN PENTING:
             * Berdasarkan HewanController.java, rutenya adalah /animalshelter/pengguna
             */
            $response = Http::withToken($token)->get("{$baseUrl}/animalshelter/pengguna");

            if ($response->successful()) {
                $result = $response->json();
                
                /**
                 * Sesuai HewanService.java method viewHewanPengguna:
                 * Response langsung mengembalikan List<Hewan> melalui BaseResponse.
                 * Jika BaseResponse lo membungkusnya di key 'data', maka gunakan $result['data'].
                 */
                $animals = $result['data'] ?? $result; 
            } else {
                Log::warning("Gagal ambil data hewan dari Java: " . $response->status());
                $animals = []; // Kosongkan jika gagal agar tidak error di view
            }
        } catch (\Exception $e) {
            Log::error("Koneksi ke Java Gagal: " . $e->getMessage());
            $animals = [];
        }

        return view('beranda.home.index', compact('animals'));
    }
}