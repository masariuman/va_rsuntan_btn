<?php

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

// Route::get('/', function () {
//     return view('dashboardvarsuntan');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'InfovarsuntanController@dataInfovarsuntan')->name('/');
Route::patch('ubah_infovarsuntan/{id}', 'InfovarsuntanController@ubahInfovarsuntan')->name('ubahInfovarsuntan');
Route::delete('hapus_infovarsuntan/{id}', 'InfovarsuntanController@hapusInfovarsuntan')->name('hapusInfovarsuntan');


Route::get('addvarsuntan', 'AddvarsuntanController@formAddvarsuntan')->name('formAddvarsuntan');
Route::post('tambah_addvarsuntan', 'AddvarsuntanController@tambahAddvarsuntan')->name('tambahAddvarsuntan');

Route::get('table', 'InfovarsuntanController@getTable')->name('getTable');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('test-inquiry', 'HomeController@test_inquiry');
Route::get('test-create', 'HomeController@test_create');
Route::get('test-update', 'HomeController@test_update');
Route::get('test-delete', 'HomeController@test_delete');
Route::get('test-report', 'HomeController@test_report');
Route::get('test-something', 'HomeController@test_something');


Route::get('shashin', 'InfovarsuntanController@header');

Route::get('account', 'HomeController@account');
Route::get('history', 'InfovarsuntanController@history');


Route::get('historyvarsuntan', 'HistoryvarsuntanController@dataHistoryvarsuntan')->name('dataHistoryvarsuntan');
