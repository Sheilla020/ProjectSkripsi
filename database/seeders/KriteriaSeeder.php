<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriterias = [
            ['nama_kriteria' => 'Tingkat Pendidikan', 'code' => 'C1'],
            ['nama_kriteria' => 'Bidang Pendidikan', 'code' => 'C2'],
            ['nama_kriteria' => 'Pengalaman Bekerja', 'code' => 'C3'],
            ['nama_kriteria' => 'Pengalaman Di Perusahaan Oil dan Gas', 'code' => 'C4'],
            ['nama_kriteria' => 'Gaji yang di Harapkan', 'code' => 'C5'],
            ['nama_kriteria' => 'Status Pekerja Saat ini', 'code' => 'C6'],
        
        ];
        DB::table('kriterias')->insert($kriterias);

        foreach ($kriterias as $kriteria) {
            $kriteria = Kriteria::create($kriteria);
            $comparison = KriteriaComparison::updateOrCreate(
                ['first_kriteria_id' => $kriteria->id, 'second_kriteria_id' => $kriteria->id],
                ['value' => 1]
            );
        }
    }
}
