<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddUserController extends Controller
{
    /*
    Add User
    */
    public function addUser(Request $request) {
        $request->validate([
            'hoTen'             => 'required',
            'email'             => 'required|unique:users|required',
            'password'          => 'required|min:6',
            'soDienThoai'       => 'required|unique:users|required|numeric',
            'ngaySinh'          => 'required',
            'diaChi'            => 'required',
            'avatar'            => 'required|image',
            'trangThai'         => 'required',
            'phanQuyen'         => 'required',
        ],[
            'hoTen.required'    => 'Tên không được để trống',
            'email.required'    => 'Email không được để trống',
            'email.unique'      => 'Email này đã đăng kí',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'      => 'Mật khẩu phải lớn hơn 6 kí tự',
            'soDienThoai.required' => 'Số điện thoại không được để trống',
            'soDienThoai.unique'  => 'Số điện thoại đã được đăng kí',
            'soDienThoai.numeric' => 'Số điện thoại phải là số',
            'ngaySinh.required'   => 'Ngày sinh không được để trống',
            'ngaySinh.date'       => 'Ngày sinh phải đúng định dạng',
            'diaChi.required'     => 'Địa chỉ không được để trống',
            'avatar.required'     => 'Hình ảnh không được để trống',
            'avatar.image'        => 'Phải nhập đúng định dạng ảnh',
            'trangThai.required'  => 'Trạng thái không được để trống',
            'phanQuyen.required'  => 'Phân quyền không được để trống',
        ]);


        return redirect('/user')->with('success', 'Data has been stored successfully!');
    }
}
