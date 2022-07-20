<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumpulanTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumpulan_tugas', function (Blueprint $table) {
            $table->integer('id_tugas', 6)->unsigned();
            $table->integer('id_siswa', 4)->unsigned();
            $table->string('link', 100);
            $table->foreign('id_tugas')->references('id_tugas')->on('tugas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengumpulan_tugas');
    }
}
