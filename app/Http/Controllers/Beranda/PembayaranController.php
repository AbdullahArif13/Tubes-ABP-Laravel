<?php

namespace App\Http\Controllers\Beranda; // Sesuaikan namespace

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    public function index()
    {
        $baseUrl = env('JAVA_API_URL');
        $token = Session::get('token');

        // Request ke Backend Java
        $response = Http::withToken($token)->get("{$baseUrl}/payments");

        if ($response->successful()) {
            $payments = $response->json()['data'];
        } else {
            $payments = config('dummy_data.payments');
        }

        return view('beranda.pembayaran.index', compact('payments'));
    }
}