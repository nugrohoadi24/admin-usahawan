<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegRegencies;

class RegProvinces extends Model
{
    use HasFactory;

    public $table = 'reg_provinces';

    public function regencies()
    {
        return $this->hasMany(RegRegencies::class,'province_id');
    }
}
