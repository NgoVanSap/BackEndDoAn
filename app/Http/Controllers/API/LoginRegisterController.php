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
    Variable Validator Register, Login
    */
    public $validatorRegister;


    public function __construct(ValidatorLoginList $validatorRegister) {

        $this->validatorRegister = $validatorRegister;

    }
    /*
    Register API
    */
    public function register (Request $request) {

        $validator = $this->validatorRegister->validatorRegister($request);

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

   /*
    Login API
    */
    public function login(Request $request) {

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $tokenResult =  $user->createToken('MyApp')->accessToken;
            return response()->json([
                'success' => 'Đăng nhập thành công!',
                'token'  => $tokenResult->token,
                'user'    => $user,
            ]);
        }
            return response()->json(['error'=>'Tài khoản hoặc mật khẩu sai!'], 401);
    }
}
