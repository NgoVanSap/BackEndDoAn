<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\ValidatorLoginList;
use file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Storage;

class LoginRegisterController extends Controller
{

    /*
    Variable Validator Register, Login
     */
    public $validatorRegister;

    public function __construct(ValidatorLoginList $validatorRegister)
    {

        $this->validatorRegister = $validatorRegister;
        Auth::shouldUse('api');

    }
    /*
    Register API
     */
    public function register(Request $request)
    {

        $validator = $this->validatorRegister->validatorRegister($request);

        $file = $request->file('avatar');
        $path = Storage::disk('google')->putFileAs('/', $file, $file->getClientOriginalName());
        $url = Storage::disk('google')->url($path);

        if ($validator->fails()) {
            return response()->json(['trangThai' => false, 'error' => $validator->messages()]);
        }

        $userCreate = User::create([
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
        $tokenResult['token'] = $userCreate->createToken('MyApp')->accessToken->token;

        if ($userCreate) {
            return json_encode([
                'thongBao' => 'Đăng kí thành công!',
                'data' => $userCreate,
            ]);
        }

    }

    /*
    Login API
     */
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không dúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json([
                'error' => 'Thông tin đăng nhập sai!',
            ]);
        }
        $expiresAt = now()->addMinutes(1);
        Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
        return $this->createNewToken($token);

    }

    /*
    Logout API
     */
    public function logout()
    {
        if (Auth::check() == false) {
            return response()->json([
                'message' => 'Người dùng chưa đăng nhập!',
            ]);
        }
        Auth::guard('api')->logout();
        return response()->json([
            'message' => 'Đăng xuất thành công!',
        ]);
    }

    /*
    get User API
     */
    public function getUser(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                'user' => Auth::user(),
            ]);
        } else {
            return response()->json([
                'status' => 'Không tìm thấy người dùng!',
            ]);
        }
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {

        if (auth()->user()) {

            return $this->createNewToken(auth('api')->refresh());

        }

        return response()->json([
            'error' => 'Người dùng chưa được xác thực!',
        ]);

    }

    /**
     * Get the token array.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'user' => auth('api')->user(),

        ]);
    }

}
