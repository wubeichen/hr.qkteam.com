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

Route::get('', 'Home\HomeController@index')->name('home');

Route::group([
    'namespace'     => 'Auth',
    'prefix'        => 'auth',
    'as'            => 'auth.',
], function () {
    Route::post('', 'SigninController@signin')->name('signin:action');
});

Route::group([
    'namespace' => 'Member',
    'prefix'    => 'member',
    'as'        => 'member.',
], function () {
    Route::get('', 'ListController@index')->name('list');
    Route::get('new', 'CreateController@index')->name('new');
    Route::post('new', 'CreateController@create')->name('new:action');
    Route::get('{member}', 'ItemController@index')->name('item');
    Route::get('{member}/edit', 'EditController@index')->name('edit');
    Route::put('{member}/edit', 'EditController@edit')->name('edit:action');
    Route::get('{member}/password', 'PasswordController@index')->name('password');
    Route::put('{member}/password', 'PasswordController@change')->name('password:action');
    Route::get('{member}/passwordreset', 'PasswordController@reset')->name('password:reset');
    Route::put('{member}/active', 'ActiveController@change')->name('active:action');
    Route::put('{member}/role', 'RoleController@change')->name('role:action');
    Route::post('recruitment/{recruitment}', 'ImportController@create')->name('import');
});

Route::group([
    'namespace' => 'Recruitment',
    'prefix'    => 'recruitment',
    'as'        => 'recruitment.',
], function () {
    Route::get('', 'FormController@index')->name('apply');
    Route::post('', 'FormController@create')->name('apply:action');
    Route::get('success', 'FormController@success')->name('apply:success');
    Route::get('list', 'ListController@index')->name('list');
    Route::get('{recruitment}', 'ItemController@index')->name('item');
});

Route::group([
    'namespace' => 'Summary',
    'prefix'    => 'summary',
    'as'        => 'summary.'
], function () {
    Route::get('', 'SummaryController@index')->name('index');
    Route::get('/member/{member}/task/{task}', 'SummaryController@list')->name('list');
    Route::post('{task}' ,'SummaryController@create')->name('new:action');
});

Route::group([
    'namespace' => 'Task',
    'prefix'    => 'task',
    'as'        => 'task.'
], function () {
    Route::post('' ,'TaskController@create')->name('new:action');
});
