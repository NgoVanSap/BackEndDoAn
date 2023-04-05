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
use Tymon\JWTAuth\Facades\JWTAuth;
use Config;
use Illuminate\Support\Facades\Http;

class LoginRegisterController extends Controller
{

   /*
    Variable Validator Register, Login
    */
    public $validatorRegister;


    public function __construct(ValidatorLoginList $validatorRegister) {

        $this->validatorRegister = $validatorRegister;
        Auth::shouldUse('api');

    }
    /*
    Register API
    */
    public function register (Request $request) {

        $validator = $this->validatorRegister->validatorRegister($request);

        // $file = $request->file('avatar');
        // $path = Storage::disk('google')->putFileAs('/', $file, $file->getClientOriginalName());
        // $url = Storage::disk('google')->url($path);

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
            // 'avatar'        => $url,
            'trangThai'     => $request->trangThai,
            'phanQuyen'     => $request->phanQuyen,
        ]);
        $tokenResult['token'] =  $userCreate->createToken('MyApp')->accessToken->token;

        if($userCreate) {
            return json_encode([
                'thongBao'         => 'Đăng kí thành công!',
                'data'             => $userCreate,
            ]);
        }

    }

   /*
    Login API
    */
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth('api')->attempt($validator->validated())) {
            return response()->json([
                'error' => 'Thông tin đăng nhập sai!'
            ], 401);
        }

        return $this->createNewToken($token);

    }

    /*
    Logout API
    */
    public function logout()
    {
        if(Auth::check() == false)
        {
            return response()->json([
                'message' => 'Người dùng chưa đăng nhập!'
            ], 401);
        }
        Auth::guard('api')->logout();
        return response()->json([
            'message' => 'Đăng xuất thành công!'
        ],200);
    }

    /*
    get User API
    */
    public function getUser(Request $request)
    {
        if(Auth::check())
        {
            return response()->json([
                'user' => Auth::user(),
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'Không tìm thấy người dùng!',
            ], 401);
        }
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {

        if(auth()->user()) {

            return $this->createNewToken(auth('api')->refresh());

        }

        return response()->json([
            'error' => 'Người dùng chưa được xác thực!'
        ]);


    }



     /**
     * Get the token array.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'user' =>auth('api')->user()

        ]);
    }

}
