<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDapendukAgamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapenduk_agamas', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah_islam', 50)->nullable();
            $table->string('jumlah_kristen', 50)->nullable();
            $table->string('jumlah_katolik', 50)->nullable();
            $table->string('jumlah_hindu', 50)->nullable();
            $table->string('jumlah_budha', 50)->nullable();
            $table->string('jumlah_konghucu', 50)->nullable();
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
        Schema::dropIfExists('dapenduk_agamas');
    }
}
