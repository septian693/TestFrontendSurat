<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login.index');
});
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

Route::get('/register', function () {
    return view('register.index');
});
Route::post('/register', [\App\Http\Controllers\LoginController::class, 'register']);

Route::post('/logout/{id}', [\App\Http\Controllers\LoginController::class, 'logout'])->name('user.logout');



Route::get('/user/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/user/dashboard', [\App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/user/lacak', [\App\Http\Controllers\UserController::class, 'lacak'])->name('user.lacak');

Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/viewdetail', [\App\Http\Controllers\AdminController::class, 'viewdetail'])->name('admin.detail');

Route::get('/admin/approv', [\App\Http\Controllers\AdminController::class, 'approv'])->name('admin.approv');
Route::post('/admin/approv', [\App\Http\Controllers\AdminController::class, 'approv'])->name('admin.approv');
Route::get('/admin/reject', [\App\Http\Controllers\AdminController::class, 'reject'])->name('admin.reject');
Route::post('/admin/reject', [\App\Http\Controllers\AdminController::class, 'reject'])->name('admin.reject');
Route::get('/admin/generate', [\App\Http\Controllers\AdminController::class, 'generate'])->name('admin.generate');
Route::post('/admin/generate', [\App\Http\Controllers\AdminController::class, 'generate'])->name('admin.generate');
// Route::get('/user/', function () {
//     return view('dashboard.index');
// });

Route::post('/user/dashboard/', [\App\Http\Controllers\UserController::class, 'permohonan'])->name('user.permohonan');

