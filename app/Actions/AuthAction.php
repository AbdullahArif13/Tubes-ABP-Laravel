<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class AuthAction
{
    // Sesuaikan Base URL API kamu di sini
    protected static $baseUrl = "https://api.your-backend.com"; 

    public static function login($body)
    {
        try {
            $response = Http::post(self::$baseUrl . "/shelter/login", $body);
            return $response->json();
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public static function logout()
    {
        // Di Laravel, logout biasanya cukup hapus session
        session()->forget('user_token');
        return ['success' => true];
    }

    public static function register($body)
    {
        try {
            $response = Http::post(self::$baseUrl . "/shelter/register", $body);
            return $response->json();
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public static function forgotPassword($body)
    {
        try {
            // Sesuai kode Next.js kamu: "/shelter/forgot"
            $response = Http::post(self::$baseUrl . "/shelter/forgot", $body);
            return $response->json();
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public static function verifyOTP($body)
    {
        try {
            // Sesuai kode Next.js kamu: "/shelter/verify"
            $response = Http::post(self::$baseUrl . "/shelter/verify", $body);
            return $response->json();
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public static function changePass($body)
    {
        try {
            // Sesuai kode Next.js kamu: "/shelter/change"
            $response = Http::post(self::$baseUrl . "/shelter/change", $body);
            return $response->json();
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}