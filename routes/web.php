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





