<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PesananController extends Controller
{
    /**
     * Tampilkan daftar pesanan milik pengguna
     */
    public function index()
    {
        $token = Session::get('user_token');
        $baseUrl = env('JAVA_API_URL');

        try {
            // Sesuai PesananController.java: GET /pesanan/pengguna/view
            $response = Http::withToken($token)->get("{$baseUrl}/pesanan/pengguna/view");
            
            $result = $response->json();
            $pesanans = $result['data'] ?? [];

            return view('beranda.pesanan.index', compact('pesanans'));
        } catch (\Exception $e) {
            Log::error("Gagal ambil data pesanan: " . $e->getMessage());
            return view('beranda.pesanan.index', ['pesanans' => []]);
        }
    }

    /**
     * Step 1: Membuat Pesanan Baru (Klik Adopt)
     */
    public function store($idHewan)
    {
        $token = Session::get('user_token');
        $baseUrl = env('JAVA_API_URL');

        try {
            // Sesuai PesananController.java: POST /pesanan/{idHewan}/create
            $response = Http::withToken($token)->post("{$baseUrl}/pesanan/{$idHewan}/create");

            if ($response->successful()) {
                $result = $response->json();
                // Biasanya BE mengembalikan ID pesanan yang baru dibuat
                $idPesanan = $result['data']['id'] ?? null; 

                return redirect()->route('pesanan.fill', $idPesanan)
                                 ->with('success', 'Pesanan dibuat, silakan isi form adopsi.');
            }

            return back()->with('error', 'Gagal membuat pesanan adopsi.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan koneksi ke server.');
        }
    }

    /**
     * Step 2: Mengirim Form Adopsi (Submit Form)
     */
    public function fillForm(Request $request, $idPesanan)
    {
        $token = Session::get('user_token');
        $baseUrl = env('JAVA_API_URL');

        // Payload ini disesuaikan 100% dengan FormDTO.java di BE lo
        $payload = [
            'nama'            => $request->nama,
            'email'           => $request->email,
            'noTelepon'       => $request->no_hp,
            'tanggalLahir'    => $request->tgl_lahir, // Format: YYYY-MM-DD
            'jenisKelamin'    => $request->jk,
            'daerah'          => $request->daerah,
            'jalan'           => $request->jalan,
            'zipCode'         => $request->zip,
            'pekerjaanStatus' => $request->pekerjaan,
            'tempatTinggal'   => $request->tempat_tinggal,
            'hewanSebelumnya' => $request->has('hewan_sebelumnya'), // Boolean
            'jenisHewan'      => $request->jenis_hewan,
            'tanggalHewan'    => $request->tgl_hewan,
            'memilikiHewan'   => $request->has('memiliki_hewan'), // Boolean
            'keluargaAlergi'  => $request->has('alergi'), // Boolean
            'lingkunganAman'  => $request->has('aman'), // Boolean
        ];

        try {
            // Sesuai PesananController.java: POST /pesanan/{id}/fill
            $response = Http::withToken($token)->post("{$baseUrl}/pesanan/{$idPesanan}/fill", $payload);

            if ($response->successful()) {
                return redirect()->route('pesanan.index')->with('success', 'Form adopsi berhasil dikirim!');
            }

            return back()->with('error', 'Gagal mengirim form. Cek kembali data lo.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal terhubung ke server.');
        }
    }

    /**
     * Detail Pesanan
     */
    public function show($idPesanan)
    {
        $token = Session::get('user_token');
        $baseUrl = env('JAVA_API_URL');

        try {
            // Sesuai PesananController.java: GET /pesanan/{id}
            $response = Http::withToken($token)->get("{$baseUrl}/pesanan/{$idPesanan}");
            $pesanan = $response->json()['data'] ?? null;

            if (!$pesanan) return abort(404);

            return view('beranda.pesanan.show', compact('pesanan'));
        } catch (\Exception $e) {
            return abort(500);
        }
    }
}