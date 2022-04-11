<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_posisi');
            $table->string('full_name');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('gander');
            $table->string('tingkat_pendidikan');
            $table->string('jurusan_pendidikan');
            $table->string('asal_instansi');
            $table->string('thn_kelulusan');
            $table->string('non_formal');
            $table->string('bh_inggris');
            $table->string('pengalaman_bekerja');
            $table->string('gaji');
            $table->string('pengalaman_oil_gas');
            $table->string('nama_perusahaan');
            $table->string('keterangan')->nullable();
            $table->char('image');
            $table->integer('nik_ktp');
            $table->integer('no_npwp');
            $table->char('filektp');
            $table->char('fileijz');
            $table->char('filecv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_profiles');
    }
}
