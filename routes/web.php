<?php

use App\Models\image;
use Google\Service\Drive;
use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use Google\Client as GoogleClient;
use Google\Service\Drive\DriveFile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Admin\AddUserController;
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
Route::group(['prefix' => '/'], function () {
    Route::get('/user', function () {

        return view('Admin.user.addUser');

    })->name('admin-add-user');
    Route::get('/dashboard', function () {

        return view('Admin.dashboard.dashboardAdmin');

    })->name('admin-dashboard');

    Route::post('/add/User/',[AddUserController::class,'addUser'])->name('add-User');
});



