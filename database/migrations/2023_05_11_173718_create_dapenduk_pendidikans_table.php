<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDapendukPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapenduk_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('sd', 50)->nullable();
            $table->string('smp', 50)->nullable();
            $table->string('sma', 50)->nullable();
            $table->string('pt_akademi', 50)->nullable();
            $table->string('tidak_sekolah', 50)->nullable();
            $table->string('jumlah', 50)->nullable();
            $table->string('bulan')->nullable();
            $table->integer('tahun')->nullable();
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
        Schema::dropIfExists('dapenduk_pendidikans');
    }
}
