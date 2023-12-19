<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kota;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kota::create([
            'provinsi_id' => 1,
            'nama_kota' => 'Bandung'
        ]);

        Kota::create([
            'provinsi_id' => 1,
            'nama_kota' => 'Garut'
        ]);

        Kota::create([
            'provinsi_id' => 1,
            'nama_kota' => 'Tasikmalaya'
        ]);

        Kota::create([
            'provinsi_id' => 2,
            'nama_kota' => 'Kudus'
        ]);

        Kota::create([
            'provinsi_id' => 2,
            'nama_kota' => 'Solo'
        ]);

        Kota::create([
            'provinsi_id' => 2,
            'nama_kota' => 'Semarang'
        ]);

        Kota::create([
            'provinsi_id' => 3,
            'nama_kota' => 'Malang'
        ]);

        Kota::create([
            'provinsi_id' => 4,
            'nama_kota' => 'Padang'
        ]);

        Kota::create([
            'provinsi_id' => 4,
            'nama_kota' => 'Medan'
        ]);

        Kota::create([
            'provinsi_id' => 5,
            'nama_kota' => 'Serang'
        ]);
    }
}
