<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Category;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $musikCategory = Category::where('name', 'Musik')->first();
        $teknologiCategory = Category::where('name', 'Teknologi')->first();
        $codingCategory = Category::where('name', 'Coding')->first();

        $events = [
            [
                'category_id' => $musikCategory->id ?? 1,
                'title' => 'Jazz Night 2024: A Celebration',
                'description' => 'Nikmati malam jazz yang spektakuler dengan pertunjukan dari artis-artis terbaik. Event ini menghadirkan pengalaman musik yang tak terlupakan dengan suasana yang intim dan elegan.',
                'date' => '2024-11-16 19:30:00',
                'location' => 'The Blue Note Lounge, Metropolis',
                'price' => 150000,
                'stock' => 500,
                'poster_path' => null,
            ],
            [
                'category_id' => $teknologiCategory->id ?? 2,
                'title' => 'AI & Future: Unleash The Power',
                'description' => 'Workshop profesional tentang kekuatan Artificial Intelligence dan masa depan teknologi. Pelajari tren terkini AI dan aplikasinya dalam industri modern.',
                'date' => '2024-10-26 09:00:00',
                'location' => 'Innovation Hub, London',
                'price' => 50000,
                'stock' => 200,
                'poster_path' => null,
            ],
            [
                'category_id' => $codingCategory->id ?? 3,
                'title' => 'Hackathon 2024: Ultimate Marathon',
                'description' => 'Kompetisi coding terbesar dengan hadiah total hingga $50,000. Kumpulkan tim terbaik Anda dan tunjukkan kemampuan coding Anda dalam marathon 24 jam non-stop.',
                'date' => '2024-10-18 08:00:00',
                'location' => 'City Innovation Hub, SF & Virtual',
                'price' => 0,
                'stock' => 1000,
                'poster_path' => null,
            ],
            [
                'category_id' => $teknologiCategory->id ?? 2,
                'title' => 'Web Development Summit 2024',
                'description' => 'Pelajari tren terbaru dalam web development dari para expert industri. Diskusi mendalam tentang framework modern, best practices, dan career tips.',
                'date' => '2024-11-10 10:00:00',
                'location' => 'Tech Center, Jakarta',
                'price' => 75000,
                'stock' => 300,
                'poster_path' => null,
            ],
            [
                'category_id' => $codingCategory->id ?? 3,
                'title' => 'Mobile App Development Workshop',
                'description' => 'Belajar mengembangkan aplikasi mobile dengan teknologi terkini. Workshop interaktif dengan hands-on project untuk pemula hingga advanced.',
                'date' => '2024-11-05 14:00:00',
                'location' => 'Developer Space, Bandung',
                'price' => 100000,
                'stock' => 150,
                'poster_path' => null,
            ],
            [
                'category_id' => $musikCategory->id ?? 1,
                'title' => 'Electronic Music Festival 2024',
                'description' => 'Festival musik elektronik terbesar dengan DJ internasional dan lokal. Nikmati musik, seni, dan budaya dalam satu event spektakuler.',
                'date' => '2024-12-01 20:00:00',
                'location' => 'Beach Arena, Bali',
                'price' => 200000,
                'stock' => 2000,
                'poster_path' => null,
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(
                ['title' => $event['title']],
                $event
            );
        }
    }
}
