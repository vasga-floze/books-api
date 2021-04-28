<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//acceder al controlador que manejara las rutas
use App\Http\Controllers\BookController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas para API
//list all books
Route::get('books', 'App\Http\Controllers\BookController@index' );

//list book by id
Route::get('book/{id}','App\Http\Controllers\BookController@show');

//save book
Route::post('book','App\Http\Controllers\BookController@store');

//update book
Route::put('book','App\Http\Controllers\BookController@store');

//delete book
Route::delete('book/{id}','App\Http\Controllers\BookController@destroy');