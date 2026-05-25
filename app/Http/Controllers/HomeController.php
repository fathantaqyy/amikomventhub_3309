<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request; // Cukup satu saja di sini

class HomeController extends Controller
{
    /**
     * Menampilkan halaman depan dengan daftar partner.
     * Mendukung pencarian jika ada parameter 'search'.
     */
    public function index(Request $request)
    {
        // Mengambil query pencarian dari input user
        $search = $request->input('search');

        // Logic: Jika ada pencarian, filter berdasarkan nama. Jika tidak, ambil semua.
        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        })
        ->latest()
        ->get();

        // Mengirim data ke view welcome
        return view('welcome', compact('partners'));
    }
}