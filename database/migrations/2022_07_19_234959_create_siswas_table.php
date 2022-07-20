<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('id_siswa', 4)->autoIncrement();
            $table->string('nisn', 10)->unique();
            $table->string('nama', 50);
            $table->integer('id_admin',1)->unsigned();
            $table->enum('jenis_kelamin', ['L', 'P']);
            // $table->foreign('id_admin')->references('id_admin')->on('admin')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
