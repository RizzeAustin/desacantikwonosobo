<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kecs', function (Blueprint $table) {
            $table->foreign('kd_prov')->references('kd_prov')->on('tbl_provs');
            $table->foreign('kd_kab')->references('kd_kab')->on('tbl_kabs');
            $table->string('kd_kec', 255);
            $table->string('kec', 255)->nullable();
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
        Schema::dropIfExists('tbl_kecs');
    }
}
