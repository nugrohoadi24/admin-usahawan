<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegDistricts;

class RegVillages extends Model
{
    use HasFactory;

    public $table = 'reg_villages';

    public function villages()
    {
        return $this->belongsTo(RegDistricts::class, 'district_id', 'id');
    }
}
