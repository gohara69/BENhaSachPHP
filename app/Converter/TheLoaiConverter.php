<?php
namespace App\Converter;

use App\DTO\TheLoai\TheLoaiHeader;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiConverter{
    public static function toTheLoaiHeader(TheLoai $theLoai){
        $theLoaiHeader = new TheLoaiHeader();
        $theLoaiHeader->id = $theLoai->id;
        $theLoaiHeader->tenTheLoai = $theLoai->ten_the_loai;
        $theLoaiHeader->createdBy = $theLoai->created_by;
        $theLoaiHeader->createdDate = $theLoai->created_date;
        $theLoaiHeader->modifiedBy = $theLoai->modified_by;
        $theLoaiHeader->modifiedDate = $theLoai->modified_date;
        return $theLoaiHeader;
    }

    public static function toTheLoaiEntity(Request $theLoai){
        $theLoaiEntity = new TheLoai();
        $theLoaiEntity->ten_the_loai = $theLoai->tenTheLoai;
        $theLoaiEntity->created_by = $theLoai->createdBy;
        $theLoaiEntity->created_date = $theLoai->createdDate;
        $theLoaiEntity->modified_by = $theLoai->modifiedBy;
        $theLoaiEntity->modified_date = $theLoai->modifiedDate;
        return $theLoaiEntity;
    }
}