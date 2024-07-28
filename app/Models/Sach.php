<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $fillable = [
        "ten",
        "ngay_xuat_ban",
        "tac_gia",
        "so_luong"
    ];
}
