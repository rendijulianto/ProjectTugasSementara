<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->integer('id_tugas', 6)->autoIncrement();
            $table->string('judul', 100);
            $table->text('konten');
            $table->dateTime('tanggal_buat');
            $table->dateTime('tanggal_tutup');
            $table->integer('id_jadwal', 6)->unsigned();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('mata_pelajaran_kelas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
