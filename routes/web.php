<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get','post'],'/','IndexController@index');
Route::match(['get','post'],'/about-me','IndexController@aboutMe');
Route::get('/blogPost/{id}', 'IndexController@blogPosts');

Route::match(['get','post'],'/admin','AdminController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']],function(){
	Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');

	//Sidebar Route
	Route::match(['get','post'],'/admin/view-sidebar','SidebarIntroController@viewSidebar');
	Route::match(['get','post'],'/admin/add-sidebar','SidebarIntroController@addSidebar');
	Route::match(['get','post'],'/admin/edit-sidebar/{id}','SidebarIntroController@editSidebar');
	Route::match(['get','post'],'/admin/delete-sidebar/{id}','SidebarIntroController@deleteSidebar');

	//AboutMe Route
	Route::match(['get','post'],'/admin/add-about','AboutMeController@addAbout');
	Route::match(['get','post'],'/admin/view-about','AboutMeController@viewAbout');
	Route::match(['get','post'],'/admin/edit-about/{id}','AboutMeController@editAbout');
	Route::match(['get','post'],'/admin/delete-about/{id}','AboutMeController@deleteAbout');

	//Blog Post Route
	Route::match(['get','post'],'/admin/add-blogPost','BlogPostController@addBlogPost');
	Route::match(['get','post'],'/admin/view-blogPost','BlogPostController@viewBlogPost');
	Route::match(['get','post'],'/admin/display-all-blogPost/{id}','BlogPostController@displayBlogPost');
	Route::match(['get','post'],'/admin/edit-blogPost/{id}','BlogPostController@editBlogPost');
	Route::match(['get','post'],'/admin/delete-blogPost/{id}','BlogPostController@deleteBlogPost');

});
Route::get('/logout','AdminController@logout');


