<?php

use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;
use Spatie\Analytics\Period;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*
Admin Dashboard
 */
Route::middleware('adminLogin')->group(function () {
    Route::get('dashboard', function () {

        return view('Admin.dashboard.dashboardAdmin');

    })->name('admin-dashboard');

    Route::get('analytics', function () {

        $analytics = Analytics::fetchMostVisitedPages(Period::days(7));

        dd($analytics);

    });

    Route::get('user/check', [AdminLoginController::class, 'checkLogin']);

    Route::middleware('adminMiddleware')->group(function () {
        Route::get('user', function () {

            return view('Admin.user.addUser');

        })->name('admin-add-user');

        Route::get('user/management', [AddUserController::class, 'userManagement'])->name('user-management');
        Route::get('user/delete/{id}', [AddUserController::class, 'userDelete'])->name('user-delete');
        Route::post('add/User', [AddUserController::class, 'addUser'])->name('add-User');
    });

    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout-admin');

});

/*
Login Admin
 */

Route::middleware('adminLogout')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('admin-login');
    Route::post('/login', [AdminLoginController::class, 'login']);
});
