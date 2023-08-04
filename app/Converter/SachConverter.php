<?php
namespace App\Converter;

use App\DTO\Sach\SachDetail;
use App\DTO\TheLoai\TheLoaiHeader;
use App\Models\Sach;
use App\Models\TheLoai;

class SachConverter{
    public static function toSachDetail($data){
        $array = [];
        for($i = 0 ; $i < $data->count() ; $i++){
            $sach = new SachDetail();
            $sach->id = $data[$i]->id;
            $sach->tenSach = $data[$i]->ten_sach;
            $sach->giaBan = $data[$i]->gia_ban;
            $theLoaiEntity = TheLoai::find($data[$i]->the_loai_id);
            $sach->theLoai = TheLoaiConverter::toTheLoaiHeader($theLoaiEntity);
            $sach->soLuong = $data[$i]->so_luong;
            $sach->giaBanDau = $data[$i]->gia_ban_dau;
            $sach->soTrang = $data[$i]->so_trang;
            $sach->ngonNgu = $data[$i]->ngon_ngu;
            $sach->thumbnail = $data[$i]->thumbnail;

            array_push($array, $sach);
        }
        return $array;
    }

    public static function toSachEntity($data){
        return [
            'ten_sach'=> $data->tenSach,
            'gia_ban'=> $data->giaBan,
            'the_loai_id' => $data->input('theLoai.id'),
            'so_luong'=> $data->soLuong,
            'gia_ban_dau'=> $data->giaBanDau,
            'so_trang'=> $data->soTrang,
            'ngon_ngu'=> $data->ngonNgu,
            'thumbnail'=> $data->thumbnail,
        ];
    }
} 