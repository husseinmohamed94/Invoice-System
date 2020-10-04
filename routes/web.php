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
/*
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

*/

Route::get('/','InvoiceController@index')->name('index');
//Route::get('/invoice/index',['as' => 'invoice.index','uses' =>'InvoiceController@index']); 

Route::get('change-language/{locale}',['as' => 'frontend_change_locale','uses'=>'GeneraController@changeLanguage']);



Route::resource('/invoice','InvoiceController');
//oute::post('invoice/store','InvoiceController@store')->name('invoice.store');
