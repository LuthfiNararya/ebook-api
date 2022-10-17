<?php

use Illuminate\Support\Facades\Route;

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

Route::get('coba', function(){
    return "Halooo :D";
});
//array
Route::get('coba1', function(){
    return ['rapli', 'jeje', 'juju'];
});
//j objek
Route::get('coba2', function(){
    return[
        'Nama' => 'Luthfina',
        'Kelas' => 'XII RPL 4',
        'NIS' => 3103120128
    ];
});
//objek json ubah status code
Route::get('coba3', function(){
    return response()->json(
        [
            'Nama' => 'Luthfina',
            'Kelas' => 'XII RPL 4',
            'NIS' => 3103120128  
        ], 201
    );
});