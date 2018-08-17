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

/*
*
* Routes to auth user
*
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'HomeController@index')->name('index.single');
Route::get('/home1', ['uses' => 'Controller@HomeEmpresa']);

Route::get('userGroup/{group}', 'UserGroupsController@index')->name('userGroupIndex.single');
Route::get('userGroups', 'UserGroupsController@select')->name('userGroupSelect.single');


Route::get('cart', 'CartController@cart')->name('cart');



Route::get('cart/insert/{id}', 'CartController@insertCourseIntoCart')->name('cart.insert');
Route::get('cart/remove/{id}', 'CartController@removeCourseFromCart')->name('cart.remove');
Route::get('checkout', 'CartController@checkout')->name('cart.checkout');

Route::get('success', 'TransactionsController@success')->name('transaction.success');

Route::get('course/{id}', 'CoursesController@course')->name('course.single');
Route::get('course/start/{id}', 'CoursesController@course_start')->name('course.start');
Route::match(['get', 'post'], 'lesson', 'CoursesController@lesson')->name('course.lesson');
Route::get('course/progress/{id}', 'CoursesController@course_progress')->name('course.progress');
Route::post('answers/{id}', 'CoursesController@answers')->name('course.answer');

Route::get('search/{id}', 'SearchController@search')->name('search.single');
Route::get('searchcat', 'SearchController@searchCat')->name('search.category');

Route::get('userPanel', 'UsersController@userPanel')->name('userPanel.single');
Route::post('userPanel/update', 'UsersController@userProfileUpdate')->name('userProfile.update');
Route::get('userPurchases', 'UsersController@userPurchases')->name('userPurchases.single');
Route::get('userPurchases/details/{hash}', 'UsersController@userPurchaseDetails')->name('userPurchaseDetails.single');


Route::middleware(['auth', 'admin'])->group(function () {
	
	Route::get('admin/home', 'AdminHomeController@index')->name('home');
	Route::get('admin/nota', 'NotasController@index')->name('nota');

	Route::get('admin/reports', 'AdminCoursesController@index')->name('reports');
	



	
	
	Route::get('/admin/categories', 'AdminCategoriesController@index')->name('categories');
	Route::get('/admin/category/create', 'AdminCategoriesController@create')->name('category.create');
	Route::post('/admin/category/store', 'AdminCategoriesController@store')->name('category.store');
	Route::get('/admin/category/edit/{id}', 'AdminCategoriesController@edit')->name('category.edit');
	Route::post('/admin/category/update/{id}', 'AdminCategoriesController@update')->name('category.update');
	Route::get('/admin/category/delete/{id}', 'AdminCategoriesController@destroy')->name('category.delete');
	Route::get('/admin/category/filter', 'AdminCategoriesController@filter')->name('category.filter');

	Route::get('/admin/compaines', 'AdminCompainesController@index')->name('compaines');
	Route::get('/admin/compaines/create', 'AdminCompainesController@create')->name('compaines.create');
	Route::post('/admin/compaines/store', 'AdminCompainesController@store')->name('compaines.store');
	Route::get('/admin/compaines/edit/{id}', 'AdminCompainesController@edit')->name('compaines.edit');
	Route::post('/admin/compaines/update/{id}', 'AdminCompainesController@update')->name('compaines.update');
	Route::get('/admin/compaines/destroy/{id}', 'AdminCompainesController@destroy')->name('compaines.destroy');

	Route::get('/admin/courses', 'AdminCoursesController@index')->name('courses');
	Route::get('/admin/courses/create', 'AdminCoursesController@create')->name('course.create');
	Route::post('/admin/courses/store', 'AdminCoursesController@store')->name('course.store');
	Route::get('/admin/courses/edit/{id}', 'AdminCoursesController@edit')->name('course.edit');
	Route::post('/admin/courses/update/{id}', 'AdminCoursesController@update')->name('course.update');
	Route::get('/admin/courses/destroy/{id}', 'AdminCoursesController@destroy')->name('course.destroy');

	Route::post('/admin/course/chapter/{id}', 'AdminCoursesController@chapter')->name('course.chapter');
	Route::get('/admin/course/chapter/edit/{id}', 'AdminCoursesController@chapter_edit')->name('course.chapter.edit');
	Route::post('/admin/course/chapter/update/{id}', 'AdminCoursesController@chapter_update')->name('course.chapter.update');
	Route::get('/admin/course/chapter/delete/{id}', 'AdminCoursesController@chapter_delete')->name('course.chapter.delete');

	Route::post('/admin/course/item/{id}', 'AdminCoursesController@item')->name('course.item');
	Route::post('/admin/course/item/child/{id}', 'AdminCoursesController@item_child')->name('course.item.child');
	Route::get('/admin/course/chapter/item/edit/{id}', 'AdminCoursesController@item_edit')->name('course.item.edit');
	Route::post('/admin/course/chapter/item/update/{id}', 'AdminCoursesController@item_update')->name('course.item.update');
	Route::get('/admin/course/chapter/item/delete/{id}', 'AdminCoursesController@item_delete')->name('course.item.delete');

	Route::post('/admin/course/multiple/{id}', 'AdminCoursesController@multiple')->name('course.multiple');

	Route::post('/admin/course/alt/{id}', 'AdminCoursesController@alt')->name('course.alt');
	Route::get('/admin/course/alt/edit/{id}', 'AdminCoursesController@alt_edit')->name('course.alt.edit');
	Route::post('/admin/course/alt/update/{id}', 'AdminCoursesController@alt_update')->name('course.alt.update');
	Route::get('/admin/course/alt/delete/{id}', 'AdminCoursesController@alt_delete')->name('course.alt.delete');

	Route::get('/admin/userGroups', 'AdminUserGroupsController@index')->name('userGroups');
	Route::get('/admin/userGroups/create', 'AdminUserGroupsController@create')->name('userGroups.create');
	Route::post('/admin/userGroups/store', 'AdminUserGroupsController@store')->name('userGroups.store');
	Route::get('/admin/userGroups/edit/{id}', 'AdminUserGroupsController@edit')->name('userGroups.edit');
	Route::post('/admin/userGroups/update/{id}', 'AdminUserGroupsController@update')->name('userGroups.update');
	Route::get('/admin/userGroups/destroy/{id}', 'AdminUserGroupsController@destroy')->name('userGroups.destroy');


	Route::get('/admin/users', 'AdminUsersController@index')->name('users');
	Route::get('/admin/user/create', 'AdminUsersController@create')->name('user.create');
	Route::post('/admin/user/store', 'AdminUsersController@store')->name('user.store');
	Route::get('/admin/user/edit/{id}', 'AdminUsersController@edit')->name('user.edit');
	Route::post('/admin/user/update/{id}', 'AdminUsersController@update')->name('user.update');
	Route::get('/admin/user/delete/{id}', 'AdminUsersController@destroy')->name('user.delete');

	Route::get('/admin/usersType', 'AdminUserTypesController@index')->name('usersType');
	Route::get('/admin/usersType/create', 'AdminUserTypesController@create')->name('userType.create');
	Route::post('/admin/usersType/store', 'AdminUserTypesController@store')->name('userType.store');
	Route::get('/admin/userType/edit/{id}', 'AdminUserTypesController@edit')->name('userType.edit');
	Route::post('/admin/userType/update/{id}', 'AdminUserTypesController@update')->name('userType.update');
	Route::get('/admin/userType/delete/{id}', 'AdminUserTypesController@destroy')->name('userType.delete');
	Route::get('/admin/courses', 'AdminCoursesController@index')->name('courses');
	Route::get('/admin/alunos', 'AdminUsersController@index')->name('alunos');

	
});



