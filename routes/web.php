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
//home
Route::get('/', 'HomeController@index')->name('index.single');



Route::get('/home1', ['uses' => 'Controller@HomeEmpresa']);
//Grupos
Route::get('userGroup/{group}', 'UserGroupsController@index')->name('userGroupIndex.single');
Route::get('userGroups', 'UserGroupsController@select')->name('userGroupSelect.single');
Route::get('/todosProfs', 'ProfController@todosProfs')->name('todosProfs');

//Carrinho
Route::get('cart', 'CartController@cart')->name('cart');
Route::get('cart/insert/{id}', 'CartController@insertCourseIntoCart')->name('cart.insert');
Route::get('cart/remove/{id}', 'CartController@removeCourseFromCart')->name('cart.remove');
Route::post('cart/cupom', 'CartController@validaCupom')->name('cart.cupom');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('/login/{id?}', 'CartController@newCart')->name('new.cart');

//Transações
Route::post('success', 'TransactionsController@statusTransaction')->name('transaction.success');
//Cursos
Route::get('course/{id}', 'CoursesController@course')->name('course.single');
Route::get('course/start/{id}', 'CoursesController@course_start')->name('course.start');
Route::get('course/course_item_toggle/{id}', 'CoursesController@course_item_toggle')->name('course.course_item_toggle');
Route::match(['get', 'post'], 'lesson', 'CoursesController@lesson')->name('course.lesson');
Route::get('course/progress/{id}', 'CoursesController@course_progress')->name('course.progress');
Route::post('answers/{id}', 'CoursesController@answers')->name('course.answer');
Route::post('comment', 'CoursesController@comment')->name('course.comment');

//Pesquisas
Route::get('search/{id}', 'SearchController@search')->name('search.single');
Route::get('searchcat', 'SearchController@searchCat')->name('search.category');

//Painel do Usuario
Route::get('userPanel', 'UsersController@userPanel')->name('userPanel.single');
Route::post('userPanel/update', 'UsersController@userProfileUpdate')->name('userProfile.update');
Route::get('userPurchases', 'UsersController@userPurchases')->name('userPurchases.single');
Route::get('userPurchases/details/{hash}', 'UsersController@userPurchaseDetails')->name('userPurchaseDetails.single');

Route::post('course/ratingstar', 'StarController@ratingStar')->name('ratingstar');
Route::get('categoria/{urn}', 'CategoriesController@category')->name('category.single');

//Empresa
Route::get('/empresa', 'CompanyController@index')->name('empresa');
Route::get('/empresa/register', 'CompanyController@registerCompany')->name('empresa.register');
Route::get('/empresa/{id}', 'CompanyController@theCompany')->name('empresa.company');
Route::group(['prefix' => 'companies', 'middleware' => ['auth']], function (){
	Route::get('/teachers', 'CompanyController@teachersIndex')->name('teachers.company');
	Route::get('/teachers/create', 'CompanyController@teachersCreate')->name('teachers.company.create');
	Route::post('/teachers/store', 'CompanyController@teachersStore')->name('teachers.company.store');
	Route::get('/teachers/destroy/{id}', 'CompanyController@teachersDestroy')->name('teachers.company.destroy');
	Route::get('/mission', 'CompanyController@mission')->name('mission.company');
	Route::post('/mission/update', 'CompanyController@missionUpdate')->name('mission.company.update');
	Route::get('/knowledge', 'CompanyController@knowledge')->name('knowledge.company');
	Route::post('/knowledge/update', 'CompanyController@knowledgeUpdate')->name('knowledge.company.update');
});

//professor
Route::get('/serprofessor', 'ProfController@beTeacher')->name('beTeacher');
Route::post('/serprofessorStore', 'ProfController@storeAnswer')->name('store.answer');
Route::get('/serprofessorDestroy/{id}', 'ProfController@destroyAnswer')->name('destroy.answer');
Route::get('/professor', 'ProfController@virarProfessor')->name('teacher');

Route::get('todosProfs/{id}', 'ProfController@courseProf')->name('course.prof');
Route::group(['prefix' => 'teacher', 'middleware' => ['auth']], function (){
	Route::get('/courses/create', 'ProfController@create')->name('course.create.teacher');
	Route::post('/courses/store', 'ProfController@store')->name('course.store.teacher');
	Route::get('/courses', 'ProfController@index')->name('courses.teacher');
	Route::get('/courses/edit/{id}', 'ProfController@edit')->name('course.edit.teacher');
	Route::post('/courses/update/{id}', 'ProfController@update')->name('course.update.teacher');
	Route::get('/courses/destroy/{id}', 'ProfController@destroy')->name('course.destroy.teacher');
	Route::get('/courses/analise/{id}', 'ProfController@analise')->name('course.analise.teacher');


	Route::get('/alunos/{id}', 'ProfController@alunosTeacher')->name('alunos.teacher');
	Route::get('/alunos/reset/{id}', 'ProfController@alunosReset')->name('alunos.reset.teacher');
	Route::get('/alunos/destroy/{id}', 'ProfController@alunosDestroy')->name('alunos.destroy.teacher');
	Route::get('/alunos/certificate/{id}', 'ProfController@certificateGenerate')->name('certificate.teacher');

	Route::get('/cupom', 'ProfController@cupomIndex')->name('cupom.teacher');
	Route::get('/cupom/create', 'ProfController@cupomCreate')->name('cupom.create.teacher');
	Route::post('/cupom/store', 'ProfController@cupomStore')->name('cupom.store.teacher');
	Route::get('/cupom/edit/{id}', 'ProfController@cupomEdit')->name('cupom.edit.teacher');
	Route::post('/cupom/update/{id}', 'ProfController@CupomUpdate')->name('cupom.update.teacher');
	Route::get('/cupom/delete/{id}', 'ProfController@cupomDestroy')->name('cupom.delete.teacher');

	Route::post('/course/chapter/{id}', 'ProfController@chapter')->name('course.chapter.teacher');
	Route::get('/course/chapter/edit/{id}', 'ProfController@chapter_edit')->name('course.chapter.edit.teacher');
	Route::post('/course/chapter/update/{id}', 'ProfController@chapter_update')->name('course.chapter.update.teacher');
	Route::get('/course/chapter/delete/{id}', 'ProfController@chapter_delete')->name('course.chapter.delete.teacher');

	Route::post('/course/item/{id}', 'ProfController@item')->name('course.item.teacher');
	Route::get('/course/chapter/item/edit/{id}', 'ProfController@item_edit')->name('course.item.edit.teacher');
	Route::post('/course/chapter/item/update/{id}', 'ProfController@item_update')->name('course.item.update.teacher');
	Route::get('/course/chapter/item/delete/{id}', 'ProfController@item_delete')->name('course.item.delete.teacher');
	Route::post('/course/item/child/{id}', 'ProfController@item_child')->name('course.item.child.teacher');

	Route::post('/course/multiple/{id}', 'ProfController@multiple')->name('course.multiple.teacher');

	Route::post('/course/alt/{id}', 'ProfController@alt')->name('course.alt.teacher');
	Route::get('/course/alt/edit/{id}', 'ProfController@alt_edit')->name('course.alt.edit.teacher');
	Route::post('/course/alt/update/{id}', 'ProfController@alt_update')->name('course.alt.update.teacher');
	Route::get('/course/alt/delete/{id}', 'ProfController@alt_delete')->name('course.alt.delete.teacher');
	
});

//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], ['auth', 'suporte']], function (){
	Route::get('/', 'AdminHomeController@index')->name('home');

	Route::get('/nota', 'NotasController@index')->name('nota');
	Route::get('/reports', 'AdminCoursesController@index')->name('reports');

	Route::get('/seo', 'AdminSeoController@index')->name('seo');
	Route::get('/seo/create', 'AdminSeoController@create')->name('seo.create');
	Route::post('/seo/store', 'AdminSeoController@store')->name('seo.store');
	Route::get('/seo/edit/{id}', 'AdminSeoController@edit')->name('seo.edit');
	Route::post('/seo/update/{id}', 'AdminSeoController@update')->name('seo.update');
	Route::get('/seo/delete/{id}', 'AdminSeoController@destroy')->name('seo.delete');

	Route::get('/cupom', 'AdminCupomController@index')->name('cupom');
	Route::get('/cupom/create', 'AdminCupomController@create')->name('cupom.create');
	Route::post('/cupom/store', 'AdminCupomController@store')->name('cupom.store');
	Route::get('/cupom/edit/{id}', 'AdminCupomController@edit')->name('cupom.edit');
	Route::post('/cupom/update/{id}', 'AdminCupomController@update')->name('cupom.update');
	Route::get('/cupom/delete/{id}', 'AdminCupomController@destroy')->name('cupom.delete');
	
	Route::get('/categories', 'AdminCategoriesController@index')->name('categories');
	Route::get('/category/create', 'AdminCategoriesController@create')->name('category.create');
	Route::post('/category/store', 'AdminCategoriesController@store')->name('category.store');
	Route::get('/category/edit/{id}', 'AdminCategoriesController@edit')->name('category.edit');
	Route::post('/category/update/{id}', 'AdminCategoriesController@update')->name('category.update');
	Route::get('/category/delete/{id}', 'AdminCategoriesController@destroy')->name('category.delete');
	Route::get('/category/filter', 'AdminCategoriesController@filter')->name('category.filter');

	Route::get('/companies', 'AdminCompaniesController@index')->name('companies');
	Route::get('/companies/create', 'AdminCompaniesController@create')->name('companies.create');
	Route::post('/companies/store', 'AdminCompaniesController@store')->name('companies.store');
	Route::get('/companies/edit/{id}', 'AdminCompaniesController@edit')->name('companies.edit');
	Route::post('/companies/update/{id}', 'AdminCompaniesController@update')->name('companies.update');
	Route::get('/companies/destroy/{id}', 'AdminCompaniesController@destroy')->name('companies.destroy');

	Route::get('/courses', 'AdminCoursesController@index')->name('courses');
	Route::get('/courses/create', 'AdminCoursesController@create')->name('course.create');
	Route::post('/courses/store', 'AdminCoursesController@store')->name('course.store');
	Route::get('/courses/edit/{id}', 'AdminCoursesController@edit')->name('course.edit');
	Route::post('/courses/update/{id}', 'AdminCoursesController@update')->name('course.update');
	Route::get('/courses/destroy/{id}', 'AdminCoursesController@destroy')->name('course.destroy');
	Route::post('/courses/alunos/store/{id}', 'AdminCoursesController@storeAluno')->name('alunos.store');
	Route::post('/courses/alunos/store/{id}', 'AdminCoursesController@storeAluno')->name('alunos.store');
	Route::get('/courses/subcateg', 'AdminCoursesController@subCateg')->name('sub.categ');

	Route::post('/course/chapter/{id}', 'AdminCoursesController@chapter')->name('course.chapter');
	Route::get('/course/chapter/edit/{id}', 'AdminCoursesController@chapter_edit')->name('course.chapter.edit');
	Route::post('/course/chapter/update/{id}', 'AdminCoursesController@chapter_update')->name('course.chapter.update');
	Route::get('/course/chapter/delete/{id}', 'AdminCoursesController@chapter_delete')->name('course.chapter.delete');

	Route::post('/course/item/{id}', 'AdminCoursesController@item')->name('course.item');
	Route::post('/course/item/child/{id}', 'AdminCoursesController@item_child')->name('course.item.child');
	Route::get('/course/chapter/item/edit/{id}', 'AdminCoursesController@item_edit')->name('course.item.edit');
	Route::post('/course/chapter/item/update/{id}', 'AdminCoursesController@item_update')->name('course.item.update');
	Route::get('/course/chapter/item/delete/{id}', 'AdminCoursesController@item_delete')->name('course.item.delete');
	Route::get('/courses/analise/', 'AdminCoursesController@analise')->name('course.analise');
	Route::get('/courses/aprove/{id}/', 'AdminCoursesController@aprove')->name('course.aprove');
	Route::get('/courses/remove/{id}/', 'AdminCoursesController@remove')->name('course.remove');


	Route::post('/course/multiple/{id}', 'AdminCoursesController@multiple')->name('course.multiple');

	Route::post('/course/alt/{id}', 'AdminCoursesController@alt')->name('course.alt');
	Route::get('/course/alt/edit/{id}', 'AdminCoursesController@alt_edit')->name('course.alt.edit');
	Route::post('/course/alt/update/{id}', 'AdminCoursesController@alt_update')->name('course.alt.update');
	Route::get('/course/alt/delete/{id}', 'AdminCoursesController@alt_delete')->name('course.alt.delete');
	Route::get('/course/diss/edit/{id}', 'AdminCoursesController@diss_edit')->name('course.diss.edit');
	Route::post('/course/diss/update/{id}', 'AdminCoursesController@diss_update')->name('course.diss.update');

	Route::get('/userGroups', 'AdminUserGroupsController@index')->name('userGroups');
	Route::get('/userGroups/create', 'AdminUserGroupsController@create')->name('userGroups.create');
	Route::post('/userGroups/store', 'AdminUserGroupsController@store')->name('userGroups.store');
	Route::get('/userGroups/edit/{id}', 'AdminUserGroupsController@edit')->name('userGroups.edit');
	Route::post('/userGroups/update/{id}', 'AdminUserGroupsController@update')->name('userGroups.update');
	Route::get('/userGroups/destroy/{id}', 'AdminUserGroupsController@destroy')->name('userGroups.destroy');

	Route::get('/users', 'AdminUsersController@index')->name('users');
	Route::get('/user/create', 'AdminUsersController@create')->name('user.create');
	Route::post('/user/store', 'AdminUsersController@store')->name('user.store');
	Route::get('/user/edit/{id}', 'AdminUsersController@edit')->name('user.edit');
	Route::post('/user/update/{id}', 'AdminUsersController@update')->name('user.update');
	Route::get('/user/delete/{id}', 'AdminUsersController@destroy')->name('user.delete');

	Route::get('/usersType', 'AdminUserTypesController@index')->name('usersType');
	Route::get('/usersType/create', 'AdminUserTypesController@create')->name('userType.create');
	Route::post('/usersType/store', 'AdminUserTypesController@store')->name('userType.store');
	Route::get('/userType/edit/{id}', 'AdminUserTypesController@edit')->name('userType.edit');
	Route::post('/userType/update/{id}', 'AdminUserTypesController@update')->name('userType.update');
	Route::get('/userType/delete/{id}', 'AdminUserTypesController@destroy')->name('userType.delete');
	Route::get('/courses', 'AdminCoursesController@index')->name('courses');
	Route::get('/alunos', 'AdminUsersController@index')->name('alunos');
	Route::get('/alunos','AdminUsersController@index' )->name('professor');

	Route::get('/posts','AdminBlogController@index' )->name('posts');
	Route::get('/post/create', 'AdminBlogController@createPost')->name('post.create');
});
