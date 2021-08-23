<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegProvinces;
use App\Models\RegDistricts;

class RegRegencies extends Model
{
    use HasFactory;

    public $table = 'reg_regencies';

    public function provinces()
    {
        return $this->belongsTo(RegProvinces::class, 'province_id', 'id');
    }

    public function district()
    {
        return $this->hasMany(RegDistricts::class, 'regency_id');
    }
}
