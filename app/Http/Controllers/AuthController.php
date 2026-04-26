<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin() { return view('auth.login'); }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Logic Dummy (Tetap ada buat jaga-jaga)
        if ($request->email == 'arifi@hewanku.ku' && $request->password == 'rahasia') {
            session([
                'user_token'    => 'dummy-token-123',
                'user_name'     => 'Abdullah Al Arifi',
                'statusShelter' => false,
                'is_logged_in'  => true
            ]);
            return redirect()->route('home');
        }

        try {
            // Sesuaikan endpoint ke /pengguna/login sesuai PenggunaController.java
            $apiUrl = env('JAVA_API_URL') . '/pengguna/login';

            $response = Http::post($apiUrl, [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $result = $response->json();

            // Sesuai PenggunaService.java: data ada di dalam key 'data'
            if ($response->successful() && isset($result['data'])) {
                $userData = $result['data'];

                session([
                    'user_token'    => $userData['token'],
                    'user_id'       => $userData['id'],
                    'user_email'    => $userData['email'],
                    'is_logged_in'  => true,
                    // Karena di Java lo belum ada status_shelter, kita default false dulu
                    'statusShelter' => $userData['status_shelter'] ?? false,
                ]);

                return redirect()->route('home')->with('success', 'Selamat datang kembali!');
            }

            // Ambil pesan error dari BaseResponse Java lo
            $message = $result['message'] ?? 'Email atau password salah.';
            return back()->with('error', $message)->onlyInput('email');

        } catch (\Exception $e) {
            Log::error("Koneksi Java Error: " . $e->getMessage());
            return back()->with('error', 'Gagal terhubung ke Server Backend.');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}