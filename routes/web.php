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

Route::group(['prefix'  => 'account_officer/', 'middleware'  =>  ['auth','role:ao']],function(){
    Route::get('/dashboard','AO\DashboardController@index')->name('ao.dashboard');
});

Route::group(['prefix'  => 'account_officer/target_saya', 'middleware'  =>  ['auth','role:ao']],function(){
    Route::get('/','AO\TargetController@index')->name('ao.target');
    Route::get('/tambah_target','AO\TargetController@add')->name('ao.target.add');
    Route::post('/tambah_target','AO\TargetController@post')->name('ao.target.post');
    Route::patch('/aktifkan_status/{id}','AO\TargetController@aktifkanStatus')->name('ao.target.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}','AO\TargetController@nonAktifkanStatus')->name('ao.target.non_aktifkan_status');
});

Route::group(['prefix'  => 'supervisor/', 'middleware'  =>  'auth','role:supervisi'],function(){
    Route::get('/dashboard','Supervisor\DashboardController@index')->name('supervisor.dashboard');
});

Route::group(['prefix'  => 'pimpinan/', 'middleware'    =>  'auth','role:pimpinan'],function(){
    Route::get('/dashboard','Pimpinan\DashboardController@index')->name('pimpinan.dashboard');
});

Route::group(['prefix'  => 'administrator/', 'middleware'  =>  ['auth','role:administrator']],function(){
    Route::get('/dashboard','Administrator\DashboardController@index')->name('administrator.dashboard');
});

Route::group(['prefix'  => 'administrator/manajemen_unit',['auth','role:administrator']],function(){
    Route::get('/','Administrator\UnitController@index')->name('administrator.unit');
    Route::get('/tambah_unit','Administrator\UnitController@add')->name('administrator.unit.add');
    Route::post('/tambah_unit','Administrator\UnitController@post')->name('administrator.unit.post');
    Route::patch('/aktifkan_status/{id}','Administrator\UnitController@aktifkanStatus')->name('administrator.unit.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}','Administrator\UnitController@nonAktifkanStatus')->name('administrator.unit.non_aktifkan_status');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
