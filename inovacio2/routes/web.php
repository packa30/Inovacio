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

Auth::routes();

Route::get('/', 'Controller@index')->name('index');

Route::get('/cennik', 'Controller@cennik')->name('cennik');

Route::get('/kontakt', function () {
    return view('kontakt');
})->name('kontakt');

Route::get('/postup-prace', function () {
    return view('postup-prace');
})->name('postup-prace');

Route::get('/realizacie', 'Controller@realizacie')->name('realizacie');

Route::group(['middleware' => ['user', 'user']], function() {
Route::get('/miestnosti/add/{popis}', 'usersController@get_addmiestnosti')->name('get_add');
Route::get('/miestnosti/{popis}/edit/{id}', 'usersController@get_editmiestnosti')->name('get_edit');
Route::get('/miestnosti/{popis}/delete/{id}', 'usersController@get_deletemiestnosti')->name('get_delete');

Route::post('/miestnosti/add/{popis}', 'usersController@post_addmiestnosti')->name('post_add');
Route::post('/miestnosti/{popis}/edit/{id}', 'usersController@post_editmiestnosti')->name('post_edit');
Route::post('/miestnosti/{popis}/delete/{id}', 'usersController@post_deletemiestnosti')->name('post_delete');

Route::get('/realizacie/add', 'usersController@get_addrealizacie')->name('realizacie_add_get');
Route::get('/subrealizacie/add/{id}', 'usersController@get_addsubrealizacie')->name('subrealizacie_add_get');
Route::get('/realizacie/edit/{id}', 'usersController@get_editrealizacie')->name('realizacie_edit_get');
Route::get('/realizacie/delete/{id}', 'usersController@get_deleterealizacie')->name('realizacie_delete_get');
Route::get('/subrealizacie/delete/{id}', 'usersController@get_deletesubrealizacie')->name('subrealizacie_delete_get');
Route::get('/subrealizacie/edit/{id}', 'usersController@get_editsubrealizacie')->name('subrealizacie_edit_get');

Route::post('/realizacie/add', 'usersController@post_addrealizacie')->name('realizacie_add_post');
Route::post('/subrealizacie/add/{id}', 'usersController@post_addsubrealizacie')->name('subrealizacie_add_post');
Route::post('/realizacie/edit/{id}', 'usersController@post_editrealizacie')->name('realizacie_edit_post');
Route::post('/realizacie/delete/{id}', 'usersController@post_deleterealizacie')->name('realizacie_delete_post');
Route::post('/subrealizacie/delete/{id}', 'usersController@post_deletesubrealizacie')->name('subrealizacie_delete_post');
Route::post('/subrealizacie/edit/{id}', 'usersController@post_editsubrealizacie')->name('subrealizacie_edit_post');

Route::post('/subrealizacie/obr_del/{id}', 'usersController@sub_obr_del')->name('sub_obr_del');

Route::get('/cennik/edit', 'usersController@get_cennik')->name('get_cennik');
Route::post('/cennik/edit', 'usersController@post_cennik')->name('post_cennik');

Route::get('/change', function () {
    return view('changepass');
})->name('change_get');
Route::post('/change', 'Controller@changepassword')->name('change_post');

});


Route::post('/formular', 'formular@mailsend')->name('formular');



Route::post('/login', 'Auth\LoginController@login')->name('login');
