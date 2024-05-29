<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDapendukPekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dapenduk_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string('petani', 50)->nullable();
            $table->string('pegawai_swasta', 50)->nullable();
            $table->string('pegawai_negeri_sipil', 50)->nullable();
            $table->string('perdagangan', 50)->nullable();
            $table->string('buruh_tani', 50)->nullable();
            $table->string('buruh_pabrik', 50)->nullable();
            $table->string('tukang_batu', 50)->nullable();
            $table->string('jasa', 50)->nullable();
            $table->string('perangkat_desa', 50)->nullable();
            $table->string('tenaga_medis', 50)->nullable();
            $table->string('tukang_kayu', 50)->nullable();
            $table->string('tukang_jahir_bordir', 50)->nullable();
            $table->string('tni_polri', 50)->nullable();
            $table->string('lain_lain_termasuk_belum_bekerja', 50)->nullable();
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
        Schema::dropIfExists('dapenduk_pekerjaans');
    }
}
