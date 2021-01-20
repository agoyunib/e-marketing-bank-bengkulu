<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix'  => 'account_officer/'],function(){
    Route::get('/','AO\DashboardController@index')->name('ao.dashboard');
});

Route::group(['prefix'  => 'account_officer/target_saya'],function(){
    Route::get('/','AO\TargetController@index')->name('ao.target');
    Route::get('/tambah_target','AO\TargetController@add')->name('ao.target.add');
    Route::post('/tambah_target','AO\TargetController@post')->name('ao.target.post');
    Route::patch('/aktifkan_status/{id}','AO\TargetController@aktifkanStatus')->name('ao.target.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}','AO\TargetController@nonAktifkanStatus')->name('ao.target.non_aktifkan_status');
});

Route::group(['prefix'  => 'supervisor/'],function(){
    Route::get('/','Supervisor\DashboardController@index')->name('supervisor.dashboard');
});

Route::group(['prefix'  => 'pimpinan/'],function(){
    Route::get('/','Pimpinan\DashboardController@index')->name('pimpinan.dashboard');
});

Route::group(['prefix'  => 'administrator/'],function(){
    Route::get('/','Administrator\DashboardController@index')->name('administrator.dashboard');
});

Route::group(['prefix'  => 'administrator/manajemen_unit'],function(){
    Route::get('/','Administrator\UnitController@index')->name('administrator.unit');
    Route::get('/tambah_unit','Administrator\UnitController@add')->name('administrator.unit.add');
    Route::post('/tambah_unit','Administrator\UnitController@post')->name('administrator.unit.post');
    Route::patch('/aktifkan_status/{id}','Administrator\UnitController@aktifkanStatus')->name('administrator.unit.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}','Administrator\UnitController@nonAktifkanStatus')->name('administrator.unit.non_aktifkan_status');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
