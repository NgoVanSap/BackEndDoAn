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
        $validator = $this->validator($request);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Auth::guard('api')->user();
        $createCategory = Category::create([
            'idGiangVien' => $user->id,
            'tenDanhMuc' => $request->tenDanhMuc,
            'moTa' => $request->moTa,
        ]);

        return response()->json(['message' => 'Tạo danh mục thành công'], 200);

    }

    public function getCategory()
    {
        $user = Auth::guard('api')->user();
        $userId = $user->id;
        $categories = Category::where('idGiangVien', $userId)->get();
        return response()->json(['data' => $categories], 200);
    }

    public function createCourse(Request $request)
    {

    }

    protected function validator($request)
    {

        return Validator::make($request->all(), [

            'tenDanhMuc' => 'required',
            'moTa' => 'required',

        ], [

            'tenDanhMuc.required' => 'Tên danh mục không để trống',
            'moTa.required' => 'Mô tả không để trống',

        ]);
    }
}
