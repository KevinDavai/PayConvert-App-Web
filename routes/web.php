<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\popupRedirect;

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
})->name('home');

Route::get('/login', [popupRedirect::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
Route::post('editavatar', [UserController::class, 'update_avatar']);


require __DIR__ . '/auth.php';
