<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaNormalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_normalizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comparison_id')->unsigned();
            $table->float('value', 8, 4);
            $table->timestamps();

            $table->foreign('comparison_id')->references('id')->on('kriteria_comparisons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_normalizations');
    }
}
