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

Auth::routes();


Route::get('admin/home', 'HomeController@index')->name('home');

Route::get('/admin/users', 'UsersController@index')->name('users');
Route::get('/admin/user/delete/{id}', 'UsersController@destroy')->name('user.delete');
Route::get('/admin/user/create', 'UsersController@create')->name('user.create');
Route::post('/admin/user/store', 'UsersController@store')->name('user.store');

Route::get('/admin/usersType', 'UsersTypeController@index')->name('usersType');
Route::get('/admin/usersType/create', 'UsersTypeController@create')->name('userType.create');
Route::post('/admin/usersType/store', 'UsersTypeController@store')->name('userType.store');
Route::get('/admin/userType/delete/{id}', 'UsersTypeController@destroy')->name('userType.delete');

Route::get('/admin/categories', 'CategoriesController@index')->name('categories');
Route::get('/admin/category/create', 'CategoriesController@create')->name('category.create');
Route::post('/admin/category/store', 'CategoriesController@store')->name('category.store');
Route::get('/admin/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');

Route::get('/admin/userGroups', 'UserGroupsController@index')->name('userGroups');
Route::get('/admin/userGroups/create', 'UserGroupsController@create')->name('userGroups.create');
Route::post('/admin/userGroups/store', 'UserGroupsController@store')->name('userGroups.store');
Route::get('/admin/userGroups/edit/{id}', 'UserGroupsController@edit')->name('userGroups.edit');
Route::post('/admin/userGroups/update/{id}', 'UserGroupsController@update')->name('userGroups.update');
Route::get('/admin/userGroups/destroy/{id}', 'UserGroupsController@destroy')->name('userGroups.destroy');