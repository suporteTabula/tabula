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

Route::get('/', 'FrontController@index')->name('index.single');
Route::get('category/{id}', 'FrontController@category')->name('category.single');
Route::get('course/{id}', 'FrontController@course')->name('course.single');
Route::get('course/chapter/{id}', 'FrontController@chapter')->name('chapter.single');
Route::get('course/chapter/item/{id}', 'FrontController@item')->name('item.single');

Route::get('search', 'FrontController@search')->name('search.single');
Route::get('searchcat', 'FrontController@searchCat')->name('search.category');

Route::get('userPanel', 'FrontController@userPanel')->name('userPanel.single');
Route::get('userProfile', 'FrontController@userProfile')->name('userProfile.single');
Route::post('userProfile/update', 'FrontController@userProfileUpdate')->name('userProfile.update');

Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('admin/home', 'HomeController@index')->name('home');

	Route::get('/admin/users', 'UsersController@index')->name('users');
	Route::get('/admin/user/delete/{id}', 'UsersController@destroy')->name('user.delete');
	Route::get('/admin/user/create', 'UsersController@create')->name('user.create');
	Route::post('/admin/user/store', 'UsersController@store')->name('user.store');
	Route::get('/admin/user/edit/{id}', 'UsersController@edit')->name('user.edit');
	Route::post('/admin/user/update/{id}', 'UsersController@update')->name('user.update');

	Route::get('/admin/usersType', 'UsersTypeController@index')->name('usersType');
	Route::get('/admin/usersType/create', 'UsersTypeController@create')->name('userType.create');
	Route::post('/admin/usersType/store', 'UsersTypeController@store')->name('userType.store');
	Route::get('/admin/userType/delete/{id}', 'UsersTypeController@destroy')->name('userType.delete');
	Route::get('/admin/userType/edit/{id}', 'UsersTypeController@edit')->name('userType.edit');
	Route::post('/admin/userType/update/{id}', 'UsersTypeController@update')->name('userType.update');

	Route::get('/admin/categories', 'CategoriesController@index')->name('categories');
	Route::get('/admin/category/create', 'CategoriesController@create')->name('category.create');
	Route::post('/admin/category/store', 'CategoriesController@store')->name('category.store');
	Route::get('/admin/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
	Route::post('/admin/category/update/{id}', 'CategoriesController@update')->name('category.update');
	Route::get('/admin/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
	Route::get('/admin/category/filter', 'CategoriesController@filter')->name('category.filter');

	Route::get('/admin/userGroups', 'UserGroupsController@index')->name('userGroups');
	Route::get('/admin/userGroups/create', 'UserGroupsController@create')->name('userGroups.create');
	Route::post('/admin/userGroups/store', 'UserGroupsController@store')->name('userGroups.store');
	Route::get('/admin/userGroups/edit/{id}', 'UserGroupsController@edit')->name('userGroups.edit');
	Route::post('/admin/userGroups/update/{id}', 'UserGroupsController@update')->name('userGroups.update');
	Route::get('/admin/userGroups/destroy/{id}', 'UserGroupsController@destroy')->name('userGroups.destroy');

	Route::get('/admin/companies', 'CompaniesController@index')->name('companies');
	Route::get('/admin/companies/create', 'CompaniesController@create')->name('companies.create');
	Route::post('/admin/companies/store', 'CompaniesController@store')->name('companies.store');
	Route::get('/admin/companies/edit/{id}', 'CompaniesController@edit')->name('companies.edit');
	Route::post('/admin/companies/update/{id}', 'CompaniesController@update')->name('companies.update');
	Route::get('/admin/companies/destroy/{id}', 'CompaniesController@destroy')->name('companies.destroy');

	Route::get('/admin/courses', 'CoursesController@index')->name('courses');
	Route::get('/admin/courses/create', 'CoursesController@create')->name('course.create');
	Route::post('/admin/courses/store', 'CoursesController@store')->name('course.store');
	Route::get('/admin/courses/edit/{id}', 'CoursesController@edit')->name('course.edit');
	Route::post('/admin/courses/update/{id}', 'CoursesController@update')->name('course.update');
	Route::get('/admin/courses/destroy/{id}', 'CoursesController@destroy')->name('course.destroy');

	Route::post('/admin/course/chapter/{id}', 'CoursesController@chapter')->name('course.chapter');
	Route::get('/admin/course/chapter/edit/{id}', 'CoursesController@chapter_edit')->name('course.chapter.edit');
	Route::post('/admin/course/chapter/update/{id}', 'CoursesController@chapter_update')->name('course.chapter.update');
	Route::get('/admin/course/chapter/delete/{id}', 'CoursesController@chapter_delete')->name('course.chapter.delete');

	Route::post('/admin/course/item/{id}', 'CoursesController@item')->name('course.item');
	Route::post('/admin/course/item/child/{id}', 'CoursesController@item_child')->name('course.item.child');
	Route::get('/admin/course/chapter/item/edit/{id}', 'CoursesController@item_edit')->name('course.item.edit');
	Route::post('/admin/course/chapter/item/update/{id}', 'CoursesController@item_update')->name('course.item.update');
	Route::get('/admin/course/chapter/item/delete/{id}', 'CoursesController@item_delete')->name('course.item.delete');

	Route::post('/admin/course/alt/{id}', 'CoursesController@alt')->name('course.alt');
	Route::get('/admin/course/alt/edit/{id}', 'CoursesController@alt_edit')->name('course.alt.edit');
	Route::post('/admin/course/alt/update/{id}', 'CoursesController@alt_update')->name('course.alt.update');
	Route::get('/admin/course/alt/delete/{id}', 'CoursesController@alt_delete')->name('course.alt.delete');
});
