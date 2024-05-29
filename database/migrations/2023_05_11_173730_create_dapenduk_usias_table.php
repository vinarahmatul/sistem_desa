<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDapendukUsiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapenduk_usias', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_usia', 50);
            $table->string('jumlah_orang_laki', 50)->nullable();
            $table->string('jumlah_orang_perempuan', 50)->nullable();
            $table->string('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('jumlah_total', 50)->nullable();
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
        Schema::dropIfExists('dapenduk_usias');
    }
}
