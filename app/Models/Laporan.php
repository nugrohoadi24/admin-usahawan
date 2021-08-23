<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $table = 'laporan';

    protected $fillable = [
        'nama_pelapor',
        'jenis_kelamin_pelapor',
        'tanggal_lahir_pelapor',
        'provinsi_pelapor',
        'kota_pelapor',
        'kecamatan_pelapor',
        'kelurahan_pelapor',
        'alamat_pelapor',
        'no_telp_pelapor',
        'email_pelapor',
        'nama_pembina_pelapor',
        'nama_dpd_pelapor',
        'tanggal_transaksi',
        'total_kerugian',
        'foto_pelapor',
        'ktp_pelapor',
        
        'nama_terlapor',
        'jenis_kelamin_terlapor',
        'no_telp_terlapor',
        'provinsi_terlapor',
        'kota_terlapor',
        'kecamatan_terlapor',
        'kelurahan_terlapor',
        'alamat_terlapor',
        'email_terlapor',
        'nama_dpd_terlapor',
        'kasus',
        'penyelesaian',
        'uraian_kasus',
        'primary_document',
        'secondary_document',
        'kategori',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'datetime:Y-m-d',
        'tanggal_transaksi' => 'datetime:Y-m-d',
    ];

    public function getFotoPelaporAttribute() {
        return url('storage/'. $this->attributes['foto_pelapor']);
    }
    public function getKtpPelaporAttribute() {
        return url('storage/'. $this->attributes['ktp_pelapor']);
    }
    public function getPrimaryDocumentAttribute() {
        return url('storage/'. $this->attributes['primary_document']);
    }
    public function getSecondaryDocumentAttribute() {
        return url('storage/'. $this->attributes['secondary_document']);
    }
    public function wilayah()
    {
        return $this->belongsTo(RegProvinces::class,'provinsi_pelapor');
    }

}
