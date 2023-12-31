<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FeedbackController,
    UserController,
    ProductController,
    PermissionController
};

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
    
    Route::controller(UserController::class)->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login'); 
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [UserController::class, 'logout']);
        Route::resource('/product', ProductController::class);
        Route::get('/feedback/{product}/detail', [FeedbackController::class, 'index']);
        Route::resource('/feedback', FeedbackController::class);
        Route::get('/roles', [PermissionController::class, 'index']);
        Route::get('/roles/{roleId}', [PermissionController::class, 'getRolePermission']);
        Route::post('/assign/permssion', [PermissionController::class, 'assignPermssion']);
        
    });