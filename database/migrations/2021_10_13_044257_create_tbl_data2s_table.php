<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblData2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data2s', function (Blueprint $table) {
            $table->id();
            $table->foreign('parent_id')->references('id')->on('tbl_data1s');
            $table->foreign('b1r7')->references('b1r7')->on('tbl_data1s'); //nomor kk
            $table->string('b4k1', 2)->nullable();
            $table->string('b4k2_nama', 255)->nullable();
            $table->string('b4k2_nik', 16); // nik
            $table->string('b4k3', 1)->nullable();
            $table->string('b4k4', 1)->nullable();
            $table->integer('b4k5')->nullable();
            $table->string('b4k6', 1)->nullable();
            $table->string('b4k7', 1)->nullable();
            $table->string('b4k8', 1)->nullable();
            $table->integer('b4k9')->nullable();
            $table->string('b4k10', 1)->nullable();
            $table->string('b4k11', 1)->nullable();
            $table->string('b4k12', 2)->nullable();
            $table->string('b4k13', 1)->nullable();
            $table->string('b4k14', 1)->nullable();
            $table->string('b4k15', 1)->nullable();
            $table->string('b4k16', 2)->nullable();
            $table->string('b4k17', 1)->nullable();
            $table->string('b4k18', 1)->nullable();
            $table->string('b4k19', 1)->nullable();
            $table->string('b4k20', 1)->nullable();
            $table->string('b4k21', 2)->nullable();
            $table->string('b4k22', 1)->nullable();
            $table->string('b4k23', 2)->nullable();
            $table->string('b4k24', 2)->nullable();
            $table->string('b4k25', 1)->nullable();
            $table->string('b4k26', 2)->nullable();
            $table->integer('tahun', 4)->nullable();
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
        Schema::dropIfExists('tbl_data2s');
    }
}
