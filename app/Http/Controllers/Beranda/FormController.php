<?php

namespace App\Http\Controllers\Beranda; // Sesuaikan namespace

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function index()
    {
        $baseUrl = env('JAVA_API_URL');
        $token = Session::get('token');

        // Request ke Backend Java
        $response = Http::withToken($token)->get("{$baseUrl}/forms");

        if ($response->successful()) {
            $forms = $response->json()['data'];
        } else {
            $forms = config('dummy_data.forms');
        }

        return view('beranda.form.index', compact('forms'));
    }
}