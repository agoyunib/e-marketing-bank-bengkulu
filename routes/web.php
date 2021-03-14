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
    return redirect()->route('login');
});

Route::group(['prefix'  => 'account_officer/', 'middleware'  =>  ['auth', 'role:ao']], function () {
    Route::get('/dashboard', 'AO\DashboardController@index')->name('ao.dashboard');
});

Route::group(['prefix'  => 'account_officer/target_saya', 'middleware'  =>  ['auth', 'role:ao']], function () {
    Route::get('/', 'AO\TargetController@index')->name('ao.target');
    Route::get('/tambah_target', 'AO\TargetController@add')->name('ao.target.add');
    Route::post('/tambah_target', 'AO\TargetController@post')->name('ao.target.post');
    Route::patch('/aktifkan_status/{id}', 'AO\TargetController@aktifkanStatus')->name('ao.target.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'AO\TargetController@nonAktifkanStatus')->name('ao.target.non_aktifkan_status');
    Route::patch('/usulkan/{id}', 'AO\TargetController@usulkan')->name('ao.target.usulkan');
});

Route::group(['prefix'  => 'supervisor/', 'middleware'  =>  'auth', 'role:supervisi'], function () {
    Route::get('/dashboard', 'Supervisor\DashboardController@index')->name('supervisor.dashboard');
});

Route::group(['prefix'  => 'supervisor/verifikasi_target', 'middleware'  =>  'auth', 'role:supervisi'], function () {
    Route::get('/', 'Supervisor\VerifikasiTargetController@index')->name('supervisor.verifikasi_terget');
    Route::patch('/verifikasi_data_target/{id}', 'Supervisor\VerifikasiTargetController@verifikasiTarget')->name('supervisor.verifikasi_data_terget');
    Route::patch('/tolak_data_target/{id}', 'Supervisor\VerifikasiTargetController@tolakTarget')->name('supervisor.tolak_data_target');
});

Route::group(['prefix'  => 'supervisor/verifikasi_realisasi', 'middleware'  =>  'auth', 'role:supervisi'], function () {
    Route::get('/', 'Supervisor\VerifikasiRealisasiController@index')->name('supervisor.verifikasi_realisasi');
    Route::patch('/verifikasi_data_realisasi/{id}', 'Supervisor\VerifikasiRealisasiController@verifikasiRealisasi')->name('supervisor.verifikasi_data_realisasi');
    Route::patch('/tolak_data_realisasi/{id}', 'Supervisor\VerifikasiRealisasiController@tolakRealisasi')->name('supervisor.tolak_data_realisasi');
});

Route::group(['prefix'  => 'administrator/manajemen_alatpromosi'],function(){
    Route::get('/','Administrator\AlatPromosiController@index')->name('administrator.alat_promosi');
    Route::get('/tambah_alatpromosi','Administrator\AlatPromosiController@add')->name('administrator.alat_promosi.add');
    Route::post('/tambah_alatpromosi','Administrator\AlatPromosiController@post')->name('administrator.alat_promosi.post');
    Route::patch('/aktifkan_status/{id}','Administrator\AlatPromosiController@aktifkanStatus')->name('administrator.alat_promosi.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}','Administrator\AlatPromosiController@nonAktifkanStatus')->name('administrator.alat_promosi.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_unit'],function(){
    Route::get('/','Administrator\UnitController@index')->name('administrator.unit');
    Route::get('/tambah_unit','Administrator\UnitController@add')->name('administrator.unit.add');
    Route::post('/tambah_unit','Administrator\UnitController@post')->name('administrator.unit.post');
    Route::patch('/aktifkan_status/{id}','Administrator\UnitController@aktifkanStatus')->name('administrator.unit.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}','Administrator\UnitController@nonAktifkanStatus')->name('administrator.unit.non_aktifkan_status');

});

Route::group(['prefix'  => 'administrator/', 'middleware'  =>  ['auth', 'role:administrator']], function () {
    Route::get('/dashboard', 'Administrator\DashboardController@index')->name('administrator.dashboard');
});

Route::group(['prefix'  => 'administrator/manajemen_unit', ['auth', 'role:administrator']], function () {
    Route::get('/', 'Administrator\UnitController@index')->name('administrator.unit');
    Route::get('/tambah_unit', 'Administrator\UnitController@add')->name('administrator.unit.add');
    Route::post('/tambah_unit', 'Administrator\UnitController@post')->name('administrator.unit.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\UnitController@aktifkanStatus')->name('administrator.unit.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\UnitController@nonAktifkanStatus')->name('administrator.unit.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_produk'], function () {
    Route::get('/', 'Administrator\ProdukController@index')->name('administrator.produk');
    Route::get('/tambah_produk', 'Administrator\ProdukController@add')->name('administrator.produk.add');
    Route::post('/tambah_produk', 'Administrator\ProdukController@post')->name('administrator.produk.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\ProdukController@aktifkanStatus')->name('administrator.produk.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\ProdukController@nonAktifkanStatus')->name('administrator.produk.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_subproduk'], function () {
    Route::get('/', 'Administrator\SubProdukController@index')->name('administrator.subproduk');
    Route::get('/tambah_subproduk', 'Administrator\SubProdukController@add')->name('administrator.subproduk.add');
    Route::post('/tambah_subproduk', 'Administrator\SubProdukController@post')->name('administrator.subproduk.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\SubProdukController@aktifkanStatus')->name('administrator.subproduk.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\SubProdukController@nonAktifkanStatus')->name('administrator.subproduk.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_jenisproduk'], function () {
    Route::get('/', 'Administrator\JenisProdukController@index')->name('administrator.jenisproduk');
    Route::get('/tambah_jenisproduk', 'Administrator\JenisProdukController@add')->name('administrator.jenisproduk.add');
    Route::post('/tambah_jenisproduk', 'Administrator\JenisProdukController@post')->name('administrator.jenisproduk.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\JenisProdukController@aktifkanStatus')->name('administrator.jenisproduk.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\JenisProdukController@nonAktifkanStatus')->name('administrator.jenisproduk.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_account_officer'], function () {
    Route::get('/', 'Administrator\AoController@index')->name('administrator.user_ao');
    Route::get('/tambah_ao', 'Administrator\AoController@add')->name('administrator.user-ao.add');
    Route::post('/tambah_ao', 'Administrator\AoController@post')->name('administrator.user_ao.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\AoController@aktifkanStatus')->name('administrator.user_ao.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\AoController@nonAktifkanStatus')->name('administrator.user_ao.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_supervisi'], function () {
    Route::get('/', 'Administrator\SupervisiController@index')->name('administrator.user_supervisi');
    Route::get('/tambah_supervisi', 'Administrator\SupervisiController@add')->name('administrator.user-supervisi.add');
    Route::post('/tambah_supervisi', 'Administrator\SupervisiController@post')->name('administrator.user_supervisi.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\SupervisiController@aktifkanStatus')->name('administrator.user_supervisi.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\SupervisiController@nonAktifkanStatus')->name('administrator.user_supervisi.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_pimpinan'], function () {
    Route::get('/', 'Administrator\PimpinanController@index')->name('administrator.user_pimpinan');
    Route::get('/tambah_pimpinan', 'Administrator\PimpinanController@add')->name('administrator.user-pimpinan.add');
    Route::post('/tambah_pimpinan', 'Administrator\PimpinanController@post')->name('administrator.user_pimpinan.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\PimpinanController@aktifkanStatus')->name('administrator.user_pimpinan.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\PimpinanController@nonAktifkanStatus')->name('administrator.user_pimpinan.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_administrator'], function () {
    Route::get('/', 'Administrator\AdministratorController@index')->name('administrator.user_administrator');
    Route::get('/tambah_administrator', 'Administrator\AdministratorController@add')->name('administrator.user-administrator.add');
    Route::post('/tambah_administrator', 'Administrator\AdministratorController@post')->name('administrator.user_administrator.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\AdministratorController@aktifkanStatus')->name('administrator.user_administrator.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\AdministratorController@nonAktifkanStatus')->name('administrator.user_administrator.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_cabang'], function () {
    Route::get('/', 'Administrator\CabangController@index')->name('administrator.cabang');
    Route::get('/tambah_cabang', 'Administrator\CabangController@add')->name('administrator.cabang.add');
    Route::post('/tambah_cabang', 'Administrator\CabangController@post')->name('administrator.cabang.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\CabangController@aktifkanStatus')->name('administrator.cabang.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\CabangController@nonAktifkanStatus')->name('administrator.cabang.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_capem'], function () {
    Route::get('/', 'Administrator\CapemController@index')->name('administrator.capem');
    Route::get('/tambah_capem', 'Administrator\CapemController@add')->name('administrator.capem.add');
    Route::post('/tambah_capem', 'Administrator\CapemController@post')->name('administrator.capem.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\CapemController@aktifkanStatus')->name('administrator.capem.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\CapemController@nonAktifkanStatus')->name('administrator.capem.non_aktifkan_status');
});

Route::group(['prefix'  => 'administrator/manajemen_komentar'], function () {
    Route::get('/', 'Administrator\KomentarController@index')->name('administrator.komentar');
    Route::get('/tambah_komentar', 'Administrator\KomentarController@add')->name('administrator.komentar.add');
    Route::post('/tambah_komentar', 'Administrator\KomentarController@post')->name('administrator.komentar.post');
    Route::patch('/aktifkan_status/{id}', 'Administrator\KomentarController@aktifkanStatus')->name('administrator.komentar.aktifkan_status');
    Route::patch('/non_aktifkan_status/{id}', 'Administrator\KomentarController@nonAktifkanStatus')->name('administrator.komentar.non_aktifkan_status');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
