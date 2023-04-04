<?php

use App\Models\User;
use App\Models\image;
use Google\Service\Drive;
use Illuminate\Http\Request;
use App\Services\Analytics as MyAnalytics;
use Spatie\Analytics\Period;
use League\Flysystem\Filesystem;
use Google\Client as GoogleClient;
use Google\Service\Drive\DriveFile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\AdminLoginController;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;


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
// Route::middleware('adminLogin')->group(function (){

        Route::get('user', function () {

            return view('Admin.user.addUser');

        })->name('admin-add-user');


        Route::get('analytics', function () {

           $analytics = Analytics::fetchMostVisitedPages(Period::days(7));


            dd($analytics);

        });
        Route::get('dashboard', function () {

            return view('Admin.dashboard.dashboardAdmin');

        })->name('admin-dashboard');

        Route::get('/user/management',[AddUserController::class,'userManagement'])->name('user-management');

        Route::post('add/User',[AddUserController::class,'addUser'])->name('add-User');


        Route::get('logout',[AdminLoginController::class,'logout'])->name('logout-admin');
// });


/*
Login Admin
 */

Route::middleware('adminLogout')->group(function (){
    Route::get('/login',[AdminLoginController::class,'loginForm'])->name('admin-login');
    Route::post('/login',[AdminLoginController::class,'login']);
});







