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
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home.index'
]);
Route::get('/user/forgot_password', [
    'uses' => 'UserController@forgotPassword',
    'as' => 'user.forgot_password'
]);

Route::get('/user/sign_in', [
    'uses' => 'UserController@getLogin',
    'as' => 'user.sign_in'
]);

Route::post('/user/sign_in', [
    'uses' => 'UserController@postLogin',
    'as' => 'user.post.sign_in'
]);

Route::get('/user/sign_up', [
    'uses' => 'UserController@beforeGetRegister',
    'as' => 'user.sign_up'
]);
Route::post('/user/sign_up/', [
    'uses' => 'UserController@postRegister',
    'as' => 'user.post.register'
]);

