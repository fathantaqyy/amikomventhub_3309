<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // 1️⃣ Admin Account
    \App\Models\User::create([
        'name' => 'Admin EventHub',
        'email' => 'admin@eventhub.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);

    // 2️⃣ Insert 3 Kategori
    $seminar = \App\Models\Category::create([
        'name' => 'Seminar',
        'slug' => 'seminar',
    ]);

    $workshop = \App\Models\Category::create([
        'name' => 'Workshop',
        'slug' => 'workshop',
    ]);

    $entertainment = \App\Models\Category::create([
        'name' => 'Entertainment',
        'slug' => 'entertainment',
    ]);

    // 3️⃣ Insert 6 Event Variatif

    \App\Models\Event::create([
        'category_id' => $seminar->id,
        'title' => 'AI & Future Tech Summit 2026',
        'description' => 'Seminar membahas perkembangan AI dan teknologi masa depan.',
        'date' => '2026-05-01 13:00:00',
        'location' => 'Auditorium Amikom',
        'price' => 75000,
        'stock' => 150,
        'poster_path' => 'posters/ai-summit.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $seminar->id,
        'title' => 'Digital Marketing Masterclass',
        'description' => 'Strategi marketing modern di era digital.',
        'date' => '2026-06-10 09:00:00',
        'location' => 'Ruang Cinema 1',
        'price' => 100000,
        'stock' => 120,
        'poster_path' => 'posters/marketing.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $workshop->id,
        'title' => 'UI/UX Design Intensive Workshop',
        'description' => 'Pelatihan desain aplikasi modern berbasis user experience.',
        'date' => '2026-07-15 10:00:00',
        'location' => 'Lab Komputer 2',
        'price' => 150000,
        'stock' => 50,
        'poster_path' => 'posters/uiux.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $workshop->id,
        'title' => 'Fullstack Web Bootcamp',
        'description' => 'Belajar Laravel dan React dari dasar hingga mahir.',
        'date' => '2026-08-20 08:00:00',
        'location' => 'Lab Programming',
        'price' => 200000,
        'stock' => 40,
        'poster_path' => 'posters/fullstack.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $entertainment->id,
        'title' => 'E-Sport U-Champ Tournament',
        'description' => 'Kompetisi E-Sport terbesar antar mahasiswa.',
        'date' => '2026-09-05 15:00:00',
        'location' => 'Sport Hall Amikom',
        'price' => 50000,
        'stock' => 300,
        'poster_path' => 'posters/esport.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $entertainment->id,
        'title' => 'Jazz Night Music Festival',
        'description' => 'Nikmati malam dengan alunan musik jazz.',
        'date' => '2026-10-01 19:00:00',
        'location' => 'Lapangan Terbuka Amikom',
        'price' => 60000,
        'stock' => 250,
        'poster_path' => 'posters/jazz.png',
    ]);
}
}
