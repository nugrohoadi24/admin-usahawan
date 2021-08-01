<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('jenis_kelamin_pelapor');
            $table->date('tanggal_lahir_pelapor');
            $table->longText('alamat_pelapor');
            $table->string('no_telp_pelapor');
            $table->string('email_pelapor');
            $table->string('nama_pembina_pelapor');
            $table->string('nama_dpd_pelapor');
            $table->date('tanggal_transaksi');
            $table->double('total_kerugian');
            $table->string('foto_pelapor');
            $table->string('ktp_pelapor');

            $table->string('nama_terlapor');
            $table->string('jenis_kelamin_terlapor');
            $table->string('no_telp_terlapor');
            $table->longText('alamat_terlapor');
            $table->string('email_terlapor')->nullable();
            $table->string('nama_dpd_terlapor')->nullable();
            $table->string('kasus');
            $table->string('penyelesaian');
            $table->longText('uraian_kasus');
            $table->string('primary_document');
            $table->string('secondary_document')->nullable();
            $table->string('kategori');
            $table->string('status');

            $table->softDeletes();
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
        Schema::dropIfExists('laporan');
    }
}
