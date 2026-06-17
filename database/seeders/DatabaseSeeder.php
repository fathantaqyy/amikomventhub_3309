<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat akun Admin dengan aman (Mencegah UNIQUE constraint failed)
        User::updateOrCreate(
            ['email' => 'admin@eventhub.com'], // Patokan email
            [
                'name' => 'Admin EventHub',
                'password' => bcrypt('password'), // Ganti 'password' sesuai keinginanmu
                'role' => 'admin'
            ]
        );

        // 2. Panggil CategorySeeder, EventSeeder, dan PartnerSeeder
        $this->call([
            CategorySeeder::class,
            EventSeeder::class,
            PartnerSeeder::class,
        ]);
    }
}
