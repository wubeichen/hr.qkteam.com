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

Route::group([
    'namespace' => 'Auth',
    'prefix'    => 'auth',
    'as'        => 'auth.'
],function(){
    Route::get('/','SigninController@index')                                    ->name('signin');
    Route::post('/','SigninController@signin')                                  ->name('signin:action');
});
Route::group([
    'namespace' =>  'Memeber',
    'prefix'    =>  'member',
    'as'        =>  'member.'
],function(){
    Route::get('/','ListController@index')                                      ->name('index');
    Route::get('new','CreateController@index')                                  ->name('new');
    Route::post('new','CreateController@create')                                ->name('new:action');
    Route::get('{member}','ItemController@index')                               ->name('item');
    Route::get('{member}/edit','EditController@index')                          ->name('edit');
    Route::put('{member}/edit','EditController@edit')                           ->name('edit:action');
    Route::post('recruitment/{recruitment}','CreateController@create')          ->name('import');
});
Route::group([
    'namespace' =>  'Recruitment',
    'prefix'    =>  'recruitment',
    'as'        =>  'recruitment.'
],function(){
    Route::get('/','FormComtroller@index')                                      ->name('index');
    Route::post('/','FormController@create')                                    ->name('index:action');
    Route::get('list','ListController@index')                                   ->name('list');
    Route::get('{recruitment}','ItemController@index')                          ->name('item');
});
