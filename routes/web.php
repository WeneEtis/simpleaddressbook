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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/addressbook', [
    'uses' => 'AddressBookController@index',
    'as' => 'addressbook'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/addressbook/create', [
        'uses' => 'AddressBookController@create',
        'as' => 'addressbook.create'
    ]);

    Route::post('/addressbook/store', [
        'uses' => 'AddressBookController@store',
        'as' => 'addressbook.store'
    ]);
    Route::get('/addressbook', [
        'uses' => 'AddressBookController@index',
        'as' => 'addressbook'
    ]);
    Route::get('/addressbook/delete/{id}', [
        'uses' => 'AddressBookController@destroy',
        'as' => 'addressbook.delete'
    ]);

    Route::get('/addressbook/edit/{id}', [
        'uses' => 'AddressBookController@edit',
        'as' => 'addressbook.edit'
    ]);

    Route::post('/addressbook/update/{id}', [
        'uses' => 'AddressBookController@update',
        'as' => 'addressbook.update'
    ]);



});

