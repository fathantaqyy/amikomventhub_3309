<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner; // Pastikan model dipanggil

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar partner yang ingin dimasukkan
        $partners = [
            [
                'name' => 'Amikom Yogyakarta',
                'logo_url' => 'https://via.placeholder.com/150?text=Amikom', // Ganti dengan path gambarmu misal: asset('assets/amikom.png')
            ],
            [
                'name' => 'Midtrans',
                'logo_url' => 'https://via.placeholder.com/150?text=Midtrans',
            ],
            [
                'name' => 'Dicoding',
                'logo_url' => 'https://via.placeholder.com/150?text=Dicoding',
            ],
            [
                'name' => 'AWS Academy',
                'logo_url' => 'https://via.placeholder.com/150?text=AWS',
            ],
            [
                'name' => 'Gojek',
                'logo_url' => 'https://via.placeholder.com/150?text=Gojek',
            ]
        ];

        // Looping untuk memasukkan data dengan aman
        foreach ($partners as $partner) {
            Partner::updateOrCreate(
                ['name' => $partner['name']], // Patokan pencarian: Nama Partner
                ['logo_url' => $partner['logo_url']] // Data yang diupdate/diisi
            );
        }
    }
}
