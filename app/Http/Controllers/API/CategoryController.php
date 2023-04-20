<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'tenDanhMuc' => 'required',
            'moTa' => 'required',

        ], [

            'tenDanhMuc.required' => 'Tên danh mục không để trống',
            'moTa.required' => 'Mô tả không để trống',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $teacherId = auth()->user()->id;

        $createCategory = Category::create([
            'idGiangVien' => $teacherId,
            'tenKhoaHoc' => $request->tenDanhMuc,
            'moTa' => $request->moTa,
        ]);

        if ($createCategory) {
            return response()->json(['message' => 'Tạo danh mục thành công'], 200);
        }

    }
}
