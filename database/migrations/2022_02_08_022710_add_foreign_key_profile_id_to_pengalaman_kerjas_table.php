<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyProfileIdToPengalamanKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengalaman_kerjas', function (Blueprint $table) {
            $table->unsignedBigInteger('detail_profile_id');
            $table->foreign('detail_profile_id')->references('id')->on('detail_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengalaman_kerjas', function (Blueprint $table) {
            $table->dropForeign('users_profile_id_foreign');
            $table->dropColumn('detail_profile_id');
        });
    }
}
