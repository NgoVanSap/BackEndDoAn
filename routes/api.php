<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginRegisterController;
use Google\Client as GoogleClient;
use Google\Service\Oauth2;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[LoginRegisterController::class,'register'])->name('register');

// Route::get('/register',[LoginRegisterController::class,'register'])->name('register');
Route::post('/login', function (Request $request) {
    // $credentials = $request->only('email', 'password');
    // if (Auth::attempt($credentials)) {
    //     $user = $request->user();
    //     $token = $user->createToken('Token Name')->accessToken;
    //     return response()->json(['token' => $token]);
    // } else {
    //     return response()->json(['error' => 'Unauthenticated'], 401);
    // }

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
});
Route::get('/auth/google', function() {
    $client = new GoogleClient();
    $client->setClientId(config('services.google.client_id'));
    $client->setClientSecret(config('services.google.client_secret'));
    $client->setRedirectUri(config('services.google.redirect'));
    $client->addScope('email');
    $client->addScope('profile');
    $authUrl = $client->createAuthUrl();
    return redirect($authUrl);
});


Route::get('/auth/google/callback', function(Request $request) {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope('email');
        $client->addScope('profile');

        if ($request->get('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($request->get('code'));
            $oauth = new Oauth2($client);
            $userData = $oauth->userinfo->get();

            $user = [
                'name' => $userData->name,
                'email' => $userData->email,
                'avatar' => $userData->picture,
                'token' => $token,
            ];
            session(['user' => $user]);

            return json_encode($user);
        }

});
