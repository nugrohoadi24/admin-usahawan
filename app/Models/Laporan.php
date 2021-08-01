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

    public function getPhotoAttribute($value) {
        return url('storage/'. $value);
    }
}
