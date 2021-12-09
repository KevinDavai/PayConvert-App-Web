<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Api\AuthController;

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

Route::prefix('v1/users')->group(function () { // Collection user
    Route::post('/post', [AuthController::class, 'register']); // Créer un compte
    Route::post('/login', [AuthController::class, 'login']); // Connexion a un compte

    Route::group(['middleware' => ['auth:sanctum']], function () { // Route accessible que si user est co via bearer token
        Route::post('/logout', [AuthController::class, 'logout']); // Deconnection d'un compte
    });
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
