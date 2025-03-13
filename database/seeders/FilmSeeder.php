<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert([
            ['Nama_film' => 'Avengers: Endgame'],
            ['Nama_film' => 'Spider-Man: No Way Home'],
            ['Nama_film' => 'Inception'],
            ['Nama_film' => 'The Dark Knight'],
            ['Nama_film' => 'Interstellar'],
        ]);
    }
}

