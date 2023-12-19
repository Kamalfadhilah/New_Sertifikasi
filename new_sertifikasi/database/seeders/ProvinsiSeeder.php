<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provinsi::create([
            'provinsi_id' => 1,
            'nama_provinsi' => 'Jawa Barat'
        ]);

        Provinsi::create([
            'provinsi_id' => 2,
            'nama_provinsi' => 'Jawa Tengah'
        ]);

        Provinsi::create([
            'provinsi_id' => 3,
            'nama_provinsi' => 'Jawa Timur'
        ]);

        Provinsi::create([
            'provinsi_id' => 4,
            'nama_provinsi' => 'Sumatera Barat'
        ]);

        Provinsi::create([
            'provinsi_id' => 5,
            'nama_provinsi' => 'Banten'
        ]);
    }
}
