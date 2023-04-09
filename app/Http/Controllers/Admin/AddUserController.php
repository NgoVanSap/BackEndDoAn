<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use file;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class AddUserController extends Controller
{
    /*
    Add User
     */
    public function addUser(UserRequest $request)
    {

        $image = $request->file('avatar');
        $path = Storage::disk('google')->putFileAs('/', $image, $image->getClientOriginalName());
        $url = Storage::disk('google')->url($path);

        $create = User::create([
            'hoTen' => $request->hoTen,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'soDienThoai' => $request->soDienThoai,
            'ngaySinh' => date('Y-m-d', strtotime($request->ngaySinh)),
            'gioiTinh' => $request->gioiTinh,
            'diaChi' => $request->diaChi,
            'avatar' => $url,
            'trangThai' => $request->trangThai,
            'phanQuyen' => $request->phanQuyen,
        ]);
        return redirect()->back()->with('success', 'Thêm người dùng thành công');
    }

    public function userManagement()
    {

        $userId = Auth::user()->id;
        $user = User::select('id', 'hoTen', 'avatar', 'phanQuyen', 'trangThai')
            ->where('id', '!=', $userId)
            ->orderBy('last_seen', 'DESC')
            ->get();
        $userInformation = User::select('email', 'soDienThoai', 'gioiTinh', 'ngaySinh', 'diaChi')
            ->where('id', '!=', $userId)
            ->orderBy('last_seen', 'DESC')->get();

        return view('Admin.userManagement.index', [
            'user' => $user,
            'userInformation' => $userInformation,
        ]);
    }

    public function userDelete($id)
    {
        $userDelete = User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Xóa người dùng thành công');

    }
}
