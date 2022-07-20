<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->integer('id_guru', 3)->autoIncrement();
            $table->integer('id_admin', 1)->unsigned();
            $table->string('nip', 20)->unique();
            $table->string('username', 20)->unique();
            $table->string('password', 64);
            $table->string('nama', 50);
            $table->text('alamat');
            $table->foreign('id_admin')->references('id_admin')->on('admin')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
