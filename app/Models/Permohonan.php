<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permohonan extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'permohonan';

    protected $fillable = [
        'nama_pemohon',
        'jenis_kelamin_pemohon',
        'tanggal_lahir_pemohon',
        'provinsi_pemohon',
        'kota_pemohon',
        'kecamatan_pemohon',
        'kelurahan_pemohon',
        'alamat_pemohon',
        'no_telp_pemohon',
        'email_pemohon',
        'nama_pembina_pemohon',
        'nama_dpd_pemohon',
        'kepentingan',
        'foto_pemohon',
        'ktp_pemohon',
        
        'nama_termohon',
        'jenis_kelamin_termohon',
        'no_telp_termohon',
        'provinsi_termohon',
        'kota_termohon',
        'kecamatan_termohon',
        'kelurahan_termohon',
        'alamat_termohon',
        'kategori',
        'status'

    ];

    public function getFotoPemohonAttribute() {
        return url('storage/'. $this->attributes['foto_pemohon']);
    }
    public function getKtpPemohonAttribute() {
        return url('storage/'. $this->attributes['ktp_pemohon']);
    }    
    public function wilayah()
    {
        return $this->belongsTo(RegProvinces::class,'provinsi_pemohon');
    }
}
