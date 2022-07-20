<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaranKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_pelajaran_kelas', function (Blueprint $table) {
            $table->integer('id_jadwal',6)->autoIncrement();
            $table->integer('id_mapel', 4)->unsigned();
            $table->integer('id_kelas', 4)->unsigned();
            $table->integer('id_guru', 3)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_pelajaran_kelas');
    }
}
