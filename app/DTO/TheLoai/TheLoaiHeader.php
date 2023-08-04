<?php
namespace App\DTO\TheLoai;
use App\Models\TheLoai;

class TheLoaiHeader{
    public $id;
    public $tenTheLoai;
    public $createdBy;
    public $createdDate;
    public $modifiedBy;
    public $modifiedDate;

    public function __construct()
    {
    }
}