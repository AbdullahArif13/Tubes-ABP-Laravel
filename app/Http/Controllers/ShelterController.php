<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ShelterController extends Controller
{
    /**
     * Menampilkan profil shelter (Ambil data dari Java)
     */
    public function index()
    {
        $token = Session::get('user_token');
        $apiUrl = env('JAVA_API_URL');

        try {
            // Kita nembak profil shelter berdasarkan token user
            $response = Http::withToken($token)->get($apiUrl . '/shelters/profile');

            if ($response->successful()) {
                $shelter = $response->json()['data'] ?? $response->json();
            } else {
                $shelter = null;
            }
        } catch (\Exception $e) {
            Log::error("Gagal ambil profil shelter: " . $e->getMessage());
            $shelter = null;
        }

        return view('beranda.profile.index', [
            'shelter' => $shelter,
            'isLoading' => false
        ]);
    }

    /**
     * Simpan Shelter Baru ke Backend Java
     */
    public function store(Request $request) 
    {
        // 1. Ambil data dari Session & Env
        $token = Session::get('user_token');
        $apiUrl = env('JAVA_API_URL');

        // 2. Siapkan data untuk dikirim ke Java
        // Sesuaikan key (shelterName, ownerName, dll) dengan DTO di Java lo
        $payload = $request->only([
            'shelterName', 'ownerName', 'noTelephone', 
            'email', 'metodePembayaran', 'negara', 
            'jalan', 'zipCode'
        ]);

        try {
            // 3. Tembak API Java (POST /api/v1/shelters)
            $response = Http::withToken($token)->post($apiUrl . '/shelters', $payload);

            if ($response->successful()) {
                // Update status shelter di session agar middleware 'check.shelter' lolos
                Session::put('statusShelter', true);

                return redirect()->route('home')->with('success', 'Shelter berhasil dibuat!');
            }

            $errorMessage = $response->json()['message'] ?? 'Gagal membuat shelter di Server Java.';
            return back()->with('error', $errorMessage)->withInput();

        } catch (\Exception $e) {
            Log::error("Koneksi BE Error saat Store Shelter: " . $e->getMessage());
            return back()->with('error', 'Tidak dapat terhubung ke server Backend Java.');
        }
    }
}