<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_comparisons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('first_kriteria_id')->unsigned();
            $table->float('nilai');
            $table->integer('second_kriteria_id')->unsigned();
            $table->timestamps();

            $table->foreign('first_kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            $table->foreign('second_kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_comparisons');
    }
}
