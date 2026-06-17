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
                'logo_url' => 'https://logo.clearbit.com/amikom.ac.id',
            ],
            [
                'name' => 'Midtrans',
                'logo_url' => 'https://logo.clearbit.com/midtrans.com',
            ],
            [
                'name' => 'Dicoding',
                'logo_url' => 'https://logo.clearbit.com/dicoding.com',
            ],
            [
                'name' => 'AWS Academy',
                'logo_url' => 'https://logo.clearbit.com/aws.amazon.com',
            ],
            [
                'name' => 'Gojek',
                'logo_url' => 'https://logo.clearbit.com/gojek.com',
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
