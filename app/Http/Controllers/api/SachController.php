<?php

namespace App\Http\Controllers\api;

use App\Converter\SachConverter;
use App\Http\Controllers\Controller;
use App\Models\Sach;
use Illuminate\Http\Request;

class SachController extends Controller
{
    public function findAll(Request $request){
        if($request->search){

        } else {
            $books = Sach::all();
            if($books->count() > 0){
                $data = [
                    'status' => 200,
                    'message' => 'Lay du lieu sach thanh cong',
                    'data' => SachConverter::toSachDetail($books)
                ];
            } else {
                $data = [
                    'status' => 404,
                    'message' => 'Khong tim thay du lieu',
                    'data' => []
                ];
            }
        }
        return response()->json($data);
    }
    public function findById($id){

    }
    public function create(Request $request){
        $result = Sach::create(SachConverter::toSachEntity($request));
        if($result){
            $data = [
                'status' => 200,
                'message' => 'Tao the loai thanh cong',
                'data' => $result,
            ];
        } else {
            $data = [
                'status' => 500,
                'message' => 'Khong the tao the loai',
                'data' => [],
            ];
        }
        return response()->json($data);
    }
    public function update(Request $request, $id){

    }
    public function delete($id){

    }
}
