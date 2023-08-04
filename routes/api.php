<?php

use App\Http\Controllers\api\SachController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TheLoaiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//======================= TheLoai request ======================
Route::prefix('admin')->group(function(){
    Route::controller(TheLoaiController::class)->group(function(){
        Route::get('theloais', 'findAll');
        Route::post('theloais', 'create');
        Route::delete('theloais/{id}', 'delete');
        Route::put('theloais/{id}', 'update');
    });
    Route::controller(SachController::class)->group(function(){
        Route::get('books', 'findAll');
        Route::post('books', 'create');
        // Route::delete('theloais/{id}', 'delete');
        // Route::put('theloais/{id}', 'update');
    });
});
