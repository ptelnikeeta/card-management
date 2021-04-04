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
    //return view('welcome');
    return redirect()->route('cards');
});

Route::get('card/{slug?}',"App\Http\Controllers\CardController@index")->name('card');
Route::get('cards/{id?}',"App\Http\Controllers\CardController@cards")->name('cards');
Route::post('card-create-submit',"App\Http\Controllers\CardController@cardCreateSubmit")->name('cardCreateSubmit');
Route::post('card-edit-submit/{id}',"App\Http\Controllers\CardController@cardEditSubmit")->name('cardEditSubmit');
Route::get('card/delete/{id}','App\Http\Controllers\CardController@cardDelete')->name('cardDelete');
