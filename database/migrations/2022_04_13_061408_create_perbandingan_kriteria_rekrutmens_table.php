<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbandinganKriteriaRekrutmensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_kriteria_rekrutmens', function (Blueprint $table) {
            $table->foreignId('kriteria_pertama');
            $table->double('nilai_perbandingan');
            $table->double('jumlah_perbandingan');
            $table->foreignId('kriteria_kedua');
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
        Schema::dropIfExists('perbandingan_kriteria_rekrutmens');
    }
}
