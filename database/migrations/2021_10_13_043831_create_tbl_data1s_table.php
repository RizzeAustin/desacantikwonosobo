<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblData1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data1s', function (Blueprint $table) {
            $table->id();
            $table->foreign('kd_prov', 2);
            $table->foreign('kd_kab', 2);
            $table->foreign('kd_kec', 3);
            $table->foreign('kd_desa', 3);
            $table->string('nm_dusun', 255)->nullable();
            $table->foreign('nm_rw', 255)->nullable();
            $table->foreign('nm_rt', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('b1r7', 16); // no kk
            $table->string('b1r8', 225)->nullable();
            $table->integer('b1r9')->nullable();
            $table->string('b1r10', 11)->nullable();

            $table->string('b2r1_tgl', 2)->nullable();
            $table->string('b2r1_bln', 2)->nullable();
            $table->string('b2r1_thn', 4)->nullable();
            $table->string('nm_pencacah', 255)->nullable();
            $table->string('kd_pencacah', 3)->nullable();
            $table->string('b2r3_tgl', 2)->nullable();
            $table->string('b2r3_bln', 2)->nullable();
            $table->string('b2r3_tahun', 4)->nullable();
            $table->string('nm_pemeriksa', 255)->nullable();
            $table->string('kd_pemeriksa', 3)->nullable();
            $table->string('b2r5', 1)->nullable();

            $table->string('b3r1a', 1)->nullable();
            $table->string('b3r1b', 1)->nullable();
            $table->integer('b3r2')->nullable();
            $table->string('b3r3', 2)->nullable();
            $table->string('b3r4a', 1)->nullable();
            $table->string('b3r4b', 1)->nullable();
            $table->string('b3r5a', 2)->nullable();
            $table->string('b3r5b', 1)->nullable();
            $table->integer('b3r6')->nullable();
            $table->string('b3r7', 2)->nullable();
            $table->string('b3r8', 1)->nullable();
            $table->string('b3r9a', 1)->nullable();
            $table->string('b3r9b', 1)->nullable();
            $table->string('b3r9c', 1)->nullable();
            $table->string('b3r10', 1)->nullable();
            $table->string('b3r11a', 1)->nullable();
            $table->string('b3r11b', 1)->nullable();
            $table->string('b3r12', 1)->nullable();

            $table->integer('b5_total_luas_lahan')->nullable()->default(0);

            $table->string('b6r1k1', 255)->nullable();
            $table->string('b6r1k2', 2)->nullable();
            $table->integer('b6r2')->nullable()->default(0);

            $table->string('b7r1a', 1)->nullable();
            $table->string('b7r1b', 1)->nullable();
            $table->string('b7r1c', 1)->nullable();
            $table->string('b7r1d', 1)->nullable();
            $table->string('b7r1e', 1)->nullable();
            $table->string('b7r1f', 1)->nullable();
            $table->string('b7r1g', 1)->nullable();
            $table->string('b7r1h', 1)->nullable();
            $table->string('b7r1i', 1)->nullable();
            $table->string('b7r1j', 1)->nullable();
            $table->string('b7r1k', 1)->nullable();
            $table->string('b7r1l', 1)->nullable();
            $table->string('b7r1m', 1)->nullable();
            $table->string('b7r1n', 1)->nullable();
            $table->string('b7r1o', 1)->nullable();
            $table->integer('b7r2a')->nullable()->default(0);
            $table->integer('b7r2b')->nullable()->default(0);
            $table->string('b7r3a1', 1)->nullable();
            $table->integer('b7r3a2')->nullable();
            $table->string('b7r3b', 1)->nullable();
            $table->integer('b7r4a')->nullable()->default(0);
            $table->integer('b7r4b')->nullable()->default(0);
            $table->integer('b7r4c')->nullable()->default(0);
            $table->integer('b7r4d')->nullable()->default(0);
            $table->integer('b7r4e')->nullable()->default(0);
            
            $table->string('b7r5a', 1)->nullable();
            $table->string('b7r6a', 1)->nullable();
            $table->string('b7r6b', 1)->nullable();
            $table->string('b7r6c', 1)->nullable();
            $table->string('b7r6d', 1)->nullable();
            $table->string('b7r6e', 1)->nullable();
            $table->string('b7r6f', 1)->nullable();
            $table->string('b7r6g', 1)->nullable();
            $table->string('b7r6h', 1)->nullable();
            $table->string('b7r6i', 1)->nullable();

            $table->string('çatatan', 255)->nullable();

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
        Schema::dropIfExists('tbl_data1s');
    }
}
