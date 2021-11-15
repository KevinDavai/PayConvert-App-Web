<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Inertia\Inertia;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
Route::post('editavatar', [UserController::class, 'update_avatar']);


require __DIR__ . '/auth.php';
