<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\popupRedirect;
use App\Http\Controllers\CardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\EmailChangeController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController as AdminAdminController;

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

Route::get('/login', [popupRedirect::class, 'loginIndex'])
    ->middleware('guest')
    ->name('login');

Route::get('/register', [popupRedirect::class, 'registerIndex'])
    ->middleware('guest')
    ->name('register');

Route::get('dashboard', [UserController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('convertir', [UserController::class, 'profil_convertir'])->middleware('auth')->name('profil_convertir');
Route::get('profil', [UserController::class, 'profil_setting'])->middleware('auth')->name('profil_setting');
Route::get('integration', [UserController::class, 'profil_integration'])->middleware('auth')->name('profil_integration');
Route::post('editavatar', [UserController::class, 'update_avatar'])->middleware('auth')->name('profile.update.avatar');
Route::post('profil/MailEdit', [UserController::class, 'update_email'])->middleware('auth')->name('profile.update.email');
Route::post('profil/PseudoEdit', [UserController::class, 'update_pseudo'])->middleware('auth')->name('profile.update.pseudo');
Route::post('profil/PasswordEdit', [UserController::class, 'update_password'])->middleware('auth')->name('profile.update.password');
Route::post('profil/PostCard', [CardController::class, 'post'])->middleware('auth')->name('profile.post_card');

//User
Route::get('/dashboard/get_userDetails', [UserController::class, 'get_userProfil'])->middleware('auth')->name('get_userProfil');

// Cards
Route::get('dashboard/cards_status', [CardController::class, 'getCardStatusFromUser'])->middleware('auth')->name('cards_get_statusFromUser');
Route::get('dashboard/cards_money', [CardController::class, 'getMoneyConvertFromUser'])->middleware('auth')->name('cards_get_moneyFromUser');
Route::get('dashboard/cardslist', [CardController::class, 'getAllCardFromUser'])->middleware('auth')->name('api.getListCard');
Route::get('dashboard/cardsAllList', [CardController::class, 'getAllCards'])->middleware('auth')->name('api.getAllCard');

require __DIR__ . '/auth.php';
