<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Ebookcontroller;
use App\Http\Controllers\AuthorController;

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

//public route
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::get('/ebooks', [Ebookcontroller::class,'index']);
Route::get('/Ebooks/{id}', [Ebookcontroller::class,'show']);
Route::get('/Authors', [Ebookcontroller::class,'index']);
Route::get('/Authors/{id}', [Ebookcontroller::class,'show']);

//protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('ebooks', Ebookcontroller::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('authors', AuthorController::class)->except('create', 'edit', 'show', 'index');
});