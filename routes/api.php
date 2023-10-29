<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
});

Route::get('/logout', function(){
    request()->user()->tokens()->delete();

    return response([], 204);
})->middleware('auth:sanctum');



Route::post('/add_new_category', [CategoryController::class, 'add_new_category']);
Route::post('/add_new_type', [TypeController::class, 'add_new_type']);
Route::post('/add_new_exam', [ExamController::class, 'add_new_exam']);
Route::post('/add_new_question', [ExamController::class, 'login']);




// get request 
Route::get('/category_all', [CategoryController::class, 'category_all']);
Route::get('/type_all', [TypeController::class, 'type_all']);
Route::get('/exam_all', [ExamController::class, 'exam_all']);
//









