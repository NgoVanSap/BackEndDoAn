<?php

namespace App\Http\Controllers\Admin;

use file;
use Storage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ValidatorLoginList;
use Illuminate\Support\Facades\Validator;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;

class AddUserController extends Controller
{
    /*
    Add User
    */
    public function addUser(UserRequest $request) {



        $image = $request->file('avatar');
        $path = Storage::disk('google')->putFileAs('/', $image, $image->getClientOriginalName());
        $url = Storage::disk('google')->url($path);

       $create =  User::create([
            'hoTen'         => $request->hoTen,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'soDienThoai'   => $request->soDienThoai,
            'ngaySinh'      => date('Y-m-d', strtotime($request->ngaySinh)),
            'gioiTinh'      => $request->gioiTinh,
            'diaChi'        => $request->diaChi,
            'avatar'        => $url,
            'trangThai'     => $request->trangThai,
            'phanQuyen'     => $request->phanQuyen,
        ]);
        return redirect()->back()->with('success', 'Thêm người dùng thành công');
    }

    public function userManagement() {

       $user = User::all();
        dd($user);
        return view('Admin.userManagement.index');
    }
}
