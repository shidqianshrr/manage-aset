<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('login');
});

Route::get('/register', 'AuthController@register');
Route::post('/register/store', 'AuthController@store');

Route::post('/login/user', 'AuthController@login');


Route::group(['middleware' => ['auth'] ],function()
{

Route::get('dashboard', 'DashboardController@index');

Route::get('elektronik', 'ElektronikController@index');
Route::get('elektronik/create', 'ElektronikController@create');
Route::post('elektronik/create', 'ElektronikController@store');
Route::get('elektronik/edit/{id}', 'ElektronikController@edit');
Route::post('elektronik/edit/{id}', 'ElektronikController@update');
Route::get('elektronik/delete/{id}', 'ElektronikController@destroy');

Route::get('furnitur', 'FurniturController@index');
Route::get('furnitur/create', 'FurniturController@create');
Route::post('furnitur/create', 'FurniturController@store');
Route::get('furnitur/edit/{id}', 'FurniturController@edit');
Route::post('furnitur/edit/{id}', 'FurniturController@update');
Route::get('furnitur/delete/{id}', 'FurniturController@destroy');

Route::get('aksesoris', 'AksesorisController@index');
Route::get('aksesoris/create', 'AksesorisController@create');
Route::post('aksesoris/create', 'AksesorisController@store');
Route::get('aksesoris/edit/{id}', 'AksesorisController@edit');
Route::post('aksesoris/edit/{id}', 'AksesorisController@update');
Route::get('aksesoris/delete/{id}', 'AksesorisController@destroy');

Route::get('lisensi', 'LisensiController@index');
Route::get('lisensi/create', 'LisensiController@create');
Route::post('lisensi/create', 'LisensiController@store');
Route::get('lisensi/edit/{id}', 'LisensiController@edit');
Route::post('lisensi/edit/{id}', 'LisensiController@update');
Route::get('lisensi/delete/{id}', 'LisensiController@destroy');

Route::get('status', 'StatusController@index');
Route::get('status/create', 'StatusController@create');
Route::post('status/create', 'StatusController@store');
Route::get('status/edit/{id}', 'StatusController@edit');
Route::post('status/edit/{id}', 'StatusController@update');
Route::get('status/delete/{id}', 'StatusController@destroy');
/* * END USER * */

/* * ADMIN * */
Route::get('aksesoris2', 'AksesorisController@admin');
Route::get('aksesoris2/export_excel', 'AksesorisController@export_excel');

Route::get('elektronik2', 'ElektronikController@admin');
Route::get('elektronik2/export_excel', 'ElektronikController@export_excel');

Route::get('furnitur2', 'FurniturController@admin');
Route::get('furnitur2/export_excel', 'FurniturController@export_excel');

Route::get('lisensi2', 'LisensiController@admin');
Route::get('lisensi2/export_excel', 'LisensiController@export_excel');

Route::get('logout', 'AuthController@logout');

});

/* Route::group(['middleware' => ['auth','checkrole:admin'] ],function()
{

Route::get('/', 'DashboardController@index');

}); */