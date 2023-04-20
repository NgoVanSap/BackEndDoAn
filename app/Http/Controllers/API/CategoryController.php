<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $createCategory = Category::create([
                'idGiangVien' => $user->id,
                'tenDanhMuc' => $request->tenDanhMuc,
                'moTa' => $request->moTa,
            ]);

            return response()->json(['message' => 'Tạo danh mục thành công'], 200);
        }
    }
}
