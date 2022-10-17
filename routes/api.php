<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Ebookcontroller;

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

Route::get('/me', [AuthController::class,'me']);

//Route::get('/Ebooks', [Ebookcontroller::class,'show']);
//Route::get('/Ebooks/(id)', [Ebookcontroller::class,'index']);
//Route::get('/Ebooks', [Ebookcontroller::class,'store']);
//Route::get('/Ebooks/(id)', [Ebookcontroller::class,'update']);
//Route::get('/Ebooks/(id)', [Ebookcontroller::class,'destroy']);

Route::resource('Ebooks', EbookController::class)->except(
    ['create', 'edit']
);