<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rws', function (Blueprint $table) {
            $table->id();
            $table->string('kd_prov', 5);
            $table->string('kd_kab', 5);
            $table->string('kd_kec', 5);
            $table->string('kd_deas', 5);
            $table->foreign('tbl_dusun_id');
            $table->string('nama', 255);
            $table->string('ketuarw', 255)->nullable();
            $table->string('jk', 1)->nullable();
            $table->string('usia', 1)->nullable();
            $table->string('pendidikan', 1)->nullable();
            $table->string('flag', 100)->nullable();
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
        Schema::dropIfExists('tbl_rws');
    }
}
