<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;

    protected $table = 'sach';
    protected $fillable = [
        'id',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
        'gia_ban',
        'gia_ban_dau',
        'gioi_thieu',
        'ngon_ngu',
        'so_luong',
        'so_trang',
        'ten_sach',
        'thumbnail',
        'the_loai_id',
        'tacgiaid'
    ];

    public function TheLoai(){
        return $this->belongsTo(TheLoai::class, 'the_loai_id', 'id');
    }

    public $timestamps = false;
}
