<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblData4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data4s', function (Blueprint $table) {
            $table->id();
            $table->foreign('parent_id')->references('id')->on('tbl_data1s');
            $table->foreign('b1r7')->references('b1r7')->on('tbl_data1s'); //no kk
            $table->string('b7r5bk0', 2)->nullable();
            $table->string('b7r5bk1', 2)->nullable();
            $table->string('b7r5bk2_usaha', 255)->nullable();
            $table->string('b7r5bk2_kode', 2)->nullable();
            $table->integer('b7r5bk3')->nullable();
            $table->string('b7r5bk4', 1)->nullable();
            $table->string('b7r5bk5', 1)->nullable();
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
        Schema::dropIfExists('tbl_data4s');
    }
}
