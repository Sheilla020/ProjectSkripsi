<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\Kriteria;
use App\Models\KriteriaComparison;
use App\Models\Posisi;
use App\Models\RatingScale;
use Illuminate\Database\Seeder;
use RatingScaleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 
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
        
        $kriterias = [
            ['nama_kriteria' => 'Tingkat Pendidikan', 'code' => 'C1'],
            ['nama_kriteria' => 'Bidang Pendidikan', 'code' => 'C2'],
            ['nama_kriteria' => 'Pengalaman Bekerja', 'code' => 'C3'],
            ['nama_kriteria' => 'Gaji yang di Harapkan', 'code' => 'C4'],
            ['nama_kriteria' => 'Pengalaman Di Perusahaan Oil dan Gas', 'code' => 'C5'],
            ['nama_kriteria' => 'Status Pekerja Saat ini', 'code' => 'C6'],
        
        ];

        foreach ($kriterias as $kriteria) {
            $kriteria = Kriteria::create($kriteria);
            $comparison = KriteriaComparison::updateOrCreate(
                ['first_kriteria_id' => $kriteria->id, 'second_kriteria_id' => $kriteria->id],
                ['nilai' => 1]
            );
        }

        $scales = [
            ['value' => 1, 'caption' => 'Sama pentingnya', 'detail' => 'Kedua elemen mempunyai pengaruh yang sama.'],
            ['value' => 2, 'caption' => 'Rata-rata', 'detail' => 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang berdekatan, Nilai ini diberikan bila ada dua kompromi di antara 2 pilihan.'],
            ['value' => 3, 'caption' => 'Sedikit lebih penting', 'detail' => 'Pengalaman dan penilaian sangat memihak satu elemen dibandingkan dengan pasangannya.'],
            ['value' => 4, 'caption' => 'Rata-rata', 'detail' => 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang berdekatan, Nilai ini diberikan bila ada dua kompromi di antara 2 pilihan.'],
            ['value' => 5, 'caption' => 'Lebih Penting', 'detail' => 'Satu elemen sangat disukai dan secara praktis dominasinya sangat nyata, dibandingkan dengan elemen pasangannya.'],
            ['value' => 6, 'caption' => 'Rata-rata', 'detail' => 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang berdekatan, Nilai ini diberikan bila ada dua kompromi di antara 2 pilihan.'],
            ['value' => 7, 'caption' => 'Sangat penting', 'detail' => 'Satu elemen terbukti sangat disukai dan secara praktis dominasinya sangat, dibandingkan dengan elemen pasangannya.'],
            ['value' => 8, 'caption' => 'Rata-rata', 'detail' => 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang berdekatan, Nilai ini diberikan bila ada dua kompromi di antara 2 pilihan.'],
            ['value' => 9, 'caption' => 'Mutlak lebih penting', 'detail' => 'Satu elemen mutlak lebih disukai dibandingkan dengan pasangannya, pada tingkat keyakinan tertinggi'],
            ['value' => 0.5, 'caption' => 'Rata-rata', 'detail' => 'lebih penting kriteria ke-dua'],
            ['value' => 0.33, 'caption' => 'Sedikit lebih penting', 'detail' => 'lebih penting kriteria ke-dua.'],
            ['value' => 0.25, 'caption' => 'Rata-rata', 'detail' => 'lebih penting kriteria ke-dua, Nilai ini diberikan bila ada dua kompromi di antara 2 pilihan.'],
            ['value' => 0.2, 'caption' => 'Lebih Penting', 'detail' => 'lebih penting kriteria ke-dua, dibandingkan dengan elemen pasangannya.'],
            ['value' => 0.17, 'caption' => 'Rata-rata', 'detail' => 'lebih penting kriteria ke-dua, Nilai ini diberikan bila ada dua kompromi di antara 2 pilihan.'],
            ['value' => 0.14, 'caption' => 'Sangat penting', 'detail' => 'Satu elemen terbukti sangat disukai pada kriteria ke-duat, dibandingkan dengan elemen pasangannya.'],
            ['value' => 0.12, 'caption' => 'Rata-rata', 'detail' => 'lebih penting kriteria ke-dua, Nilai ini diberikan bila ada dua kompromi di antara 2 pilihan.'],
            ['value' => 0.11, 'caption' => 'Mutlak lebih penting', 'detail' => 'Satu elemen mutlak lebih disukai lebih penting kriteria ke-dua, pada tingkat keyakinan tertinggi'],
        
        ];
        foreach ($scales as $scale) {
            $scale = RatingScale::create($scale);
        }
    }
}
