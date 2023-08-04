<?php

namespace App\Http\Controllers\api;

use App\Converter\TheLoaiConverter;
use App\DTO\TheLoai\TheLoaiHeader;
use App\Http\Controllers\Controller;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function findAll(Request $request){
        if($request->tentheloai){
            $theLoais = TheLoai::where('ten_the_loai','like','%'.$request->tentheloai.'%')->get();
            if($theLoais->count() > 0){
                $data = [
                    'status' => 200,
                    'message' => 'Lay du lieu thanh cong',
                    'data' => $this->converToTheLoaiHeaderList($theLoais)
                ];
            } else {
                $data = [
                    'status' => 404,
                    'message' => 'Khong tim thay du lieu',
                    'data' => []
                ];
            }
            return response()->json($data);
        }
        $theLoais = TheLoai::all();
        if($theLoais->count() > 0){
            $data = [
                'status' => 200,
                'message' => 'Lay du lieu thanh cong',
                'data' => $this->converToTheLoaiHeaderList($theLoais)
            ];
        } else {
            $data = [
                'status' => 404,
                'message' => 'Khong tim thay du lieu',
                'data' => []
            ];
        }
        return response()->json($data);
    }

    public function converToTheLoaiHeaderList($tentheloai){
        $arrayTheLoai = [];
        for($i = 0 ; $i < $tentheloai->count() ; $i++){
            array_push($arrayTheLoai, TheLoaiConverter::toTheLoaiHeader($tentheloai[$i]));
        }
        return $arrayTheLoai;
    }

    public function findById($id)
    {
        $theloai = TheLoai::find($id);
        if($theloai){
            $data = [
                'status' => 200,
                'message' => 'Tim the loai thanh cong',
                'data' => $theloai,
            ];
        } else {
            $data = [
                'status' => 500,
                'message' => 'Khong tim thay the loai',
                'data' => [],
            ];
        }
        return response()->json($data);
    }

    public function create(Request $request){
        $result = TheLoai::create([
            'created_by' => $request->createdBy,
            'created_date' => $request->createdDate,
            'modified_by' => $request->modifiedBy,
            'modified_date' => $request->modifiedDate,
            'ten_the_loai' => $request->tenTheLoai
        ]);
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

    public function update(Request $request, $id)
    {
        $theLoai = TheLoai::find($id);
        if($theLoai){
            $theLoai->update([
                'created_by' => $theLoai->created_by,
                'created_date' => $theLoai->created_date,
                'modified_by' => $request->modifiedBy,
                'modified_date' => $request->modifiedDate,
                'ten_the_loai' => $request->tenTheLoai
            ]);
            $data = [
                'status' => 200,
                'message' => 'Cap nhat the loai thanh cong',
                'data' => [],
            ];
        } else {
            $data = [
                'status' => 500,
                'message' => 'Khong tim thay the loai de cap nhat',
                'data' => [],
            ];
        }
        return response()->json($data);
    }

    public function delete($id)
    {
        $sach = Sach::where('the_loai_id','=',$id)->get();
        if($sach->count() > 0){
            $data = [
                'status' => 400,
                'message' => 'Khong the xoa chu de do co foreign key',
                'data' => []
            ];
        } else {
            $theLoai = TheLoai::find($id);
            if($theLoai){
                $theLoai->delete();
                $data = [
                    'status' => 200,
                    'message' => 'Xoa the loai thanh cong',
                    'data' => [],
                ];
            } else {
                $data = [
                    'status' => 500,
                    'message' => 'Khong tim thay the loai de xóa',
                    'data' => [],
                ];
            }
        }
        return response()->json($data);
    }

    public function findAllSachByGenre(Request $request){
        $theLoai = TheLoai::findOrFail($request->id);
        return response()->json($theLoai->sachs()->findAll());
    }
}
