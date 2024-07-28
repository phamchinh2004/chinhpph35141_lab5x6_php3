<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhacSi extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten',
        'ngay_sinh',
        'que_quan',
        'anh'
    ];
    public function amNhacs()
    {
        return $this->hasMany(AmNhac::class, 'id_nhac_si');
    }
}
