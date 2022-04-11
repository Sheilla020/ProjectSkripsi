<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\Keputusan;
use App\Models\Kriteria;
use App\Models\Posisi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'nama' => 'SDM',
            'slug' => 'sdm'
        ]);
        Divisi::create([
            'nama' => 'Komersial',
            'slug' => 'komersial'
        ]);
        Divisi::create([
            'nama' => 'Finance',
            'slug' => 'finance'
        ]);
        Divisi::create([
            'nama' => 'Engeenering',
            'slug' => 'engeenering'
        ]);
        Posisi::create([
            'nama' => 'Admin',
            'slug' => 'admin',
            'id_divisi' => '1'
        ]);
        Posisi::create([
            'nama' => 'Admin',
            'slug' => 'admin',
            'id_divisi' => '2'
        ]);
        Posisi::create([
            'nama' => 'Staff',
            'slug' => 'staff',
            'id_divisi' => '3'
        ]);
        Posisi::create([
            'nama' => 'Staff',
            'slug' => 'Staff',
            'id_divisi' => '4'
        ]);
        Keputusan::create([
            'kriteria_for' => 'Perekrutan',
        ]);
        Keputusan::create([
            'kriteria_for' => 'Pelatihan',
        ]);

        Kriteria::create([
            'keputusan_id' => '1',
            'nama_kriteria' => 'Tingkat pendidikan'
        ]);

        Kriteria::create([
            'keputusan_id' => '1',
            'nama_kriteria' => 'Bidang pendidikan'
        ]);

        Kriteria::create([
            'keputusan_id' => '1',
            'nama_kriteria' => 'Pengalaman Bekerja'
        ]);

        Kriteria::create([
            'keputusan_id' => '1',
            'nama_kriteria' => 'Pengalalam Di Perusahaan Oil Dan Gas'
        ]);

        Kriteria::create([
            'keputusan_id' => '1',
            'nama_kriteria' => 'Gaji yang di Harapkan'
        ]);

        Kriteria::create([
            'keputusan_id' => '1',
            'nama_kriteria' => 'Status Pekerja saat ini'
        ]);
        Kriteria::create([
            'keputusan_id' => '2',
            'nama_kriteria' => 'kriteria 1'
        ]);

        Kriteria::create([
            'keputusan_id' => '2',
            'nama_kriteria' => 'Kriteria 2'
        ]);
    }
}
