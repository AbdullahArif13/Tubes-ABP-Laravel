<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileShelterController extends Controller
{
    public function index()
    {
        // Data dummy sesuai shelterData di Next.js kamu
        $shelter = [
            'shleterName' => 'RAKA HOME',
            'ownerName' => 'GavinJAWA',
            'email' => 'GavinA@gmail.com',
            'noTelephone' => '+6282170677488',
            'metodePembayaran' => 'mandiri',
            'negara' => 'indonesia',
            'jalan' => 'diponegoro',
            'zipCode' => '12345',
            'foto' => null // Bisa diisi path gambar jika ada
        ];

        return view('beranda.profile_shelter.index', compact('shelter'));
    }

    public function update(Request $request)
    {
        // Handle logic update ke Backend API di sini nanti
        return back()->with('success', 'Shelter berhasil diupdate');
    }
}