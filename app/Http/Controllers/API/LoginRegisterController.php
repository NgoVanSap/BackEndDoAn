<?php

namespace App\Http\Controllers\API;

use file;
use Storage;
use App\Models\User;
use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ValidatorLoginList;
use Illuminate\Support\Facades\Validator;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;

class LoginRegisterController extends Controller
{

   /*
    Variable Validator Login
    */
    public $validatorLogin;

    public function __construct(ValidatorLoginList $validatorLogin) {

        $this->validatorLogin = $validatorLogin;

    }
    /*
    Register API
    */
    public function register (Request $request) {

        $validator = $this->validatorLogin->validatorLogin($request);

        $file = $request->file('avatar');
        $path = Storage::disk('google')->putFileAs('/', $file, $file->getClientOriginalName());
        $url = Storage::disk('google')->url($path);

        if ($validator->fails()) {
            return response()->json(['trangThai' => false, 'error' => $validator->messages()]);
        }

        $userCreate = User::create([
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
        $tokenResult['token'] =  $userCreate->createToken('MyApp')->accessToken->token;

        if($userCreate) {
            return json_encode([
                'thongBao'         => 'Đăng kí thành công!',
                'data'             => $userCreate,
                '_tokenResult'     => $tokenResult,

            ]);
        }

    }
}
