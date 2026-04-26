<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Wajib untuk nembak API Java
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // --- VIEW METHODS ---
    // (Tetap sama seperti kode lo sebelumnya)

    public function showLogin() { return view('auth.login'); }
    public function showRegister() { return view('auth.register'); }
    public function showForgotPassword() { return view('auth.forgot-password'); }
    public function showSetPassword() { return view('auth.set-password'); }

    // --- LOGIC METHODS (SINKRON KE JAVA) ---

    /**
     * Login ke Backend Java
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            // Ambil URL dari .env (JAVA_API_URL=http://localhost:8080/api/v1)
            $apiUrl = env('JAVA_API_URL');

            $response = Http::post($apiUrl . '/auth/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                // Simpan data krusial ke Session Laravel
                // Sesuaikan key JSON ('token', 'user', dll) dengan response dari Java lo
                session([
                    'user_token'    => $data['token'] ?? null,
                    'user_id'       => $data['user']['id'] ?? null,
                    'user_name'     => $data['user']['name'] ?? 'User',
                    'statusShelter' => $data['user']['has_shelter'] ?? false, // Buat middleware check.shelter
                    'is_logged_in'  => true
                ]);

                return redirect()->route('home')->with('success', 'Selamat datang kembali!');
            }

            return back()->with('error', 'Email atau password salah.')->onlyInput('email');

        } catch (\Exception $e) {
            Log::error("Koneksi Java Error: " . $e->getMessage());
            return back()->with('error', 'Gagal terhubung ke Server Backend.');
        }
    }

    /**
     * Register ke Backend Java
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        try {
            $apiUrl = env('JAVA_API_URL');

            $response = Http::post($apiUrl . '/auth/register', [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($response->successful()) {
                return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
            }

            $errorMessage = $response->json()['message'] ?? 'Gagal mendaftarkan akun.';
            return back()->with('error', $errorMessage)->withInput();

        } catch (\Exception $e) {
            return back()->with('error', 'Server Backend sedang bermasalah.');
        }
    }

    /**
     * Handle Forgot Password (Kirim Email via Java)
     */
    public function handleForgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        try {
            $response = Http::post(env('JAVA_API_URL') . '/auth/forgot-password', [
                'email' => $request->email
            ]);

            if ($response->successful()) {
                return back()->with('success', 'Instruksi reset password telah dikirim ke email lo.');
            }

            return back()->with('error', 'Email tidak terdaftar.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghubungi server.');
        }
    }

    /**
     * Logout & Bersihkan Session
     */
    public function logout(Request $request)
    {
        // Bersihkan semua session Laravel
        session()->flush();
        
        return redirect()->route('login')->with('success', 'Berhasil keluar.');
    }
}