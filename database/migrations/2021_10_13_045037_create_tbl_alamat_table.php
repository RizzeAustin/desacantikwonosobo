<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rts', function (Blueprint $table) {
            $table->foreign('kd_prov')->references('kd_prov')->on('tbl_provs');
            $table->foreign('kd_kab')->references('kd_kab')->on('tbl_kabs');
            $table->foreign('kd_kec')->references('kd_kec')->on('tbl_kecs');
            $table->foreign('kd_desa')->references('kd_desa')->on('tbl_desas');
            $table->string('nm_rt', 255);
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
        Schema::dropIfExists('tbl_rts');
    }
}
