<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('jenis_kelamin_pemohon');
            $table->date('tanggal_lahir_pemohon');
            $table->string('provinsi_pemohon');
            $table->string('kota_pemohon');
            $table->string('kecamatan_pemohon');
            $table->string('kelurahan_pemohon');
            $table->longText('alamat_pemohon');
            $table->string('no_telp_pemohon');
            $table->string('email_pemohon');
            $table->string('nama_pembina_pemohon');
            $table->string('nama_dpd_pemohon');
            $table->string('kepentingan');
            $table->string('foto_pemohon');
            $table->string('ktp_pemohon');

            $table->string('nama_termohon');
            $table->string('jenis_kelamin_termohon');
            $table->string('no_telp_termohon');
            $table->string('provinsi_termohon');
            $table->string('kota_termohon');
            $table->string('kecamatan_termohon')->nullable();
            $table->string('kelurahan_termohon')->nullable();
            $table->longText('alamat_termohon');
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
        Schema::dropIfExists('permohonan');
    }
}
