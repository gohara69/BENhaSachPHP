<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    protected $table = 'the_loai';

    protected $fillable = [
        'id',
        'created_by',
        'created_date',
        'modified_by',
        'modified_date',
        'ten_the_loai'
    ];

    public function sachs(){
        return $this->hasMany(Sach::class, 'the_loai_id','id'); 
    }
    public $timestamps=false;
}
