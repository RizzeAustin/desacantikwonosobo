<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_desas', function (Blueprint $table) {
            $table->foreign('kd_prov')->references('kd_prov')->on('tbl_provs');
            $table->foreign('kd_kab')->references('kd_kab')->on('tbl_kabs');
            $table->foreign('kd_kec')->references('kd_kec')->on('tbl_kecs');
            $table->string('kd_desa', 255);
            $table->string('desa', 255)->nullable();
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
        Schema::dropIfExists('tbl_desas');
    }
}
