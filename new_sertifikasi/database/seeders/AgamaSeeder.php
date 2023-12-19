<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agama::create([
            'nama_agama' => 'Islam'
        ]);

        Agama::create([
            'nama_agama' => 'Katholik'
        ]);

        Agama::create([
            'nama_agama' => 'Kristen'
        ]);

        Agama::create([
            'nama_agama' => 'Hindu'
        ]);

        Agama::create([
            'nama_agama' => 'Budha'
        ]);

        Agama::create([
            'nama_agama' => 'Lainnya'
        ]);
    }
}
