<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudsController;
use App\Http\Controllers\MassageController;
use App\Http\Controllers\PasswordChangeController;

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
//web page
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register' => true]);

//admin dashboard
Route::get('/adminloginpanel', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//crud
Route::resource('clientmsg','App\Http\Controllers\CrudsController');
//Messages sending by web page
Route::post('/send',[MassageController::class, 'store'])->name('send');
//password change
Route::get('/changePassword',[PasswordChangeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
Route::post('/changePassword',[PasswordChangeController::class, 'changePasswordPost'])->name('changePasswordPost');
