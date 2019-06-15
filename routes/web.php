<?php

use CMS\App\Role;
use CMS\App\Permission;



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



Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth']], function(){
	// post Auth
	Route::get('/post/create/{id?}', 'postController@create')->name('post.create');
	Route::get('/posts/trashed', 'postController@trashed')->name('posts.trashed');
	Route::post('/post/store', 'postController@store')->name('post.store');
	Route::get('/posts', 'postController@index')->name('posts');
	Route::get('/post/delete/{id}', 'postController@destroy')->name('post.delete');
	Route::get('/post/hdelete/{id}', 'postController@hardDelete')->name('post.hdelete');
	Route::get('/post/restore/{id}', 'postController@restore')->name('post.restore');
	Route::get('/post/edit/{id}', 'postController@edit')->name('post.edit');
	Route::post('/post/update/{id}', 'postController@update')->name('post.update');

	// categories Auth
	Route::get('/categories', 'categoryController@index')->name('categories');
	Route::get('/category/edit/{id}', 'categoryController@edit')->name('category.edit');
	Route::get('/category/delete/{id}', 'categoryController@destroy')->name('category.delete');
	Route::get('/category/create', 'categoryController@create')->name('category.create');
	Route::post('/category/store', 'categoryController@store')->name('category.store');
	Route::post('/category/update/{id}', 'categoryController@update')->name('category.update');

	// tags Auth
	Route::get('/tags', 'tagController@index')->name('tags');
	Route::get('/tag/edit/{id}', 'tagController@edit')->name('tag.edit');
	Route::get('/tag/delete/{id}', 'tagController@destroy')->name('tag.delete');
	Route::get('/tag/create', 'tagController@create')->name('tag.create');
	Route::post('/tag/store', 'tagController@store')->name('tag.store');
	Route::post('/tag/update/{id}', 'tagController@update')->name('tag.update');

	// user 
	Route::get('/users', 'userController@index')->name('users');
	Route::get('/user/edit/{id}', 'userController@edit')->name('user.edit');
	Route::get('/user/delete/{id}', 'userController@destroy')->name('user.delete');
	Route::get('/user/create', 'userController@create')->name('user.create');
	Route::post('/user/store', 'userController@store')->name('user.store');
	Route::get('/user/admin/{id}', 'userController@admin')->name('user.admin');
	
	// setting 
	Route::get('/settings', 'settingController@index')->name('settings');
	Route::post('/settings', 'settingController@update')->name('setting.update');

	

});
// Ui 
Route::get('/', 'websiteUiController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/post/{slug}', 'websiteUiController@showPost')->name('show.post');
Route::get('/tag/{id}', 'websiteUiController@showTag')->name('show.tag');
Route::get('/category/{id}', 'websiteUiController@showCategory')->name('show.category');
Route::get('/search', 'websiteUiController@search')->name('search');




Route::get('/muhamed', function(){
	return CMS\User::find(1)->profile;
})->name('muhamed');



Route::get('/newrole', function(){
	$owner = new Role();
	$owner->name         = 'owner';
	$owner->display_name = 'Project Owner'; // optional
	$owner->description  = 'User is the owner of a given project'; // optional
	$owner->save();


	$admin = new Role();
	$admin->name         = 'admin';
	$admin->display_name = 'User Administrator'; // optional
	$admin->description  = 'User is allowed to manage and edit other users'; // optional
	$admin->save();

	return back();
})->name('newrole');


Route::get('/permission', function(){
	$createPost = new Permission();
	$createPost->name         = 'create-post';
	$createPost->display_name = 'Create Posts'; // optional
	// Allow a user to...
	$createPost->description  = 'create new blog posts'; // optional
	$createPost->save();

	$editUser = new Permission();
	$editUser->name         = 'edit-user';
	$editUser->display_name = 'Edit Users'; // optional
	// Allow a user to...
	$editUser->description  = 'edit existing users'; // optional
	$editUser->save();

	return back();
})->name('permission');



Route::group(['middleware' => ['role:administrator']], function(){

	Route::resource('users', 'UsersController');
	Route::resource('permission', 'PermissionController');
	Route::resource('roles', 'RolesController');
	
});
