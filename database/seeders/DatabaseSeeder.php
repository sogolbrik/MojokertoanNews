<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'     => 'admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('admin123'),
        ]);

        $kategori = [
            'Politik',
            'Teknologi',
            'Kesehatan',
            'Ekonomi',
        ];
        foreach ($kategori as $item) {
            Category::create([
                'nama' => $item,
                'slug' => $item
            ]);
        }

        for ($i = 0; $i < 6; $i++) {
            News::create([
                'judul' => 'Politik' . $i,
                'id_category' => 1,
                'konten' => 'Politik Kebebasan' . $i,
                'waktu' => now(),
            ]);
        }

    }
}
