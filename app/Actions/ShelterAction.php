<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ShelterAction
{
    public static function getShelter($id)
    {
        $baseUrl = env('JAVA_API_URL');
        $token = Session::get('token'); // Ambil token Java dari session

        $response = Http::withToken($token)
                        ->get("{$baseUrl}/shelter/{$id}");

        return $response->json();
    }

    public static function createShelter($userId, $payload)
    {
        $baseUrl = env('JAVA_API_URL');
        $token = Session::get('token');

        $response = Http::withToken($token)
                        ->post("{$baseUrl}/shelter/create", $payload);

        return [
            'statusCode' => $response->status(),
            'message' => $response->json()['message'] ?? 'Success',
            'data' => $response->json()['data'] ?? null
        ];
    }
}