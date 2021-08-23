<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegRegencies;
use App\Models\RegVillages;

class RegDistricts extends Model
{
    use HasFactory;

    public $table = 'reg_districts';

    public function regency()
    {
        return $this->belongsTo(RegRegencies::class, 'regency_id', 'id');
    }

    public function villages()
    {
        return $this->hasMany(RegVillages::class, 'district_id');
    }
}
