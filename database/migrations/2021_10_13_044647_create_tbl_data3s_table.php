<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblData3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data3s', function (Blueprint $table) {
            $table->id();
            $table->foreign('parent_id')->references('id')->on('tbl_data1s');
            $table->foreign('b1r7')->references('b1r7')->on('tbl_data1s'); //no kk
            $table->string('b5k1', 2)->nullable();
            $table->string('b5k2', 255)->nullable();
            $table->string('b5k3', 1)->nullable();
            $table->string('b5k4', 1)->nullable();
            $table->string('b5k5', 255)->nullable();
            $table->integer('b5k6')->nullable();
            $table->string('b5k7', 1)->nullable();
            $table->string('b5k8', 255)->nullable();
                       
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
        Schema::dropIfExists('tbl_data3s');
    }
}
