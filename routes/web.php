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


////CLIENT/////

//HOME
Route::get('/', 'ClientController@index');

//SERVICES
Route::get('/services', 'ClientController@services');

//TREATMENTS
Route::get('/treatments', 'ClientController@treatments');

//PRODUCTS
Route::get('/products', 'ClientController@products');
Route::get('/products/fetch', 'ClientController@fetch')->name('products.fetch');

//BLOGS
Route::get('/blogs/{blog}/categories', 'ClientController@blog_categories')->name('blogs.categories');
Route::get('/blogs/{blog}/details', 'ClientController@blog_details')->name('blogs.details');
Route::post('/blogs/search', 'ClientController@blog_search')->name('blogs.search');
Route::get('/blogs', 'ClientController@blogs');

//GALLERY
Route::get('gallery', 'ClientController@gallery');

//ERROR
Route::get('error', 'ClientController@error');

//RESERVATIONS
Route::get('/reservation', 'ClientController@reservation');

//CUSTOMER RESERVATIONS
Route::post('/reservation/reserve', 'ClientController@reserve')->name('reservation.reserve');


/////ADMIN/////

//AUTHENTICATION
Route::get('/admin/login', 'AuthController@login')->middleware('checklog');
Route::post('/admin/check', 'AuthController@check')->name('login.check');
Route::post('/admin/logout', 'AuthController@logout')->name('admin.logout');

Route::group(['middleware' => 'admin' ], function() {

	//DASHBOARD
	Route::get('/admin/dashboard', 'DashboardController@index');
	Route::post('/admin/dashboard/send', 'DashboardController@send')->name('messages.send');

	//CONFIGS
	Route::get('/admin/configs', 'AdminController@index');

	//ERRORS
	Route::get('/admin/errors', 'ErrorPageController@index');
	Route::post('/admin/errors/{error}/update', 'ErrorPageController@update')->name('errors.update');

	Route::post('/admin/configs/{admin}/update', 'AdminController@update')->name('configs.update');
	Route::post('/admin/configs/{admin}/change', 'AdminController@change')->name('configs.change');

	//BLOGS
	Route::get('/admin/blogs/headers', 'BlogController@header');
	Route::get('/admin/blogs/headers/create', 'BlogController@createHeader')->name('blogs.headers.create');
	Route::post('/admin/blogs/headers/store', 'BlogController@storeHeader')->name('blogs.headers.store');
	Route::get('/admin/blogs/headers/{header}/edit', 'BlogController@editHeader')->name('blogs.headers.edit');
	Route::patch('/admin/blogs/headers/{header}/update', 'BlogController@updateHeader')->name('blogs.headers.update');
	Route::post('/admin/blogs/headers/{header}/active', 'BlogController@active')->name('blogs.headers.active');
	Route::delete('/admin/blogs/headers/{header}/destroy', 'BlogController@destroyHeader')->name('blogs.headers.destroy');
	Route::get('/admin/blogs/categories', 'BlogController@categories');
	Route::get('/admin/blogs/categories/create', 'BlogController@createCategory')->name('blogs.categories.create');
	Route::post('/admin/blogs/categories/store', 'BlogController@storeCategory')->name('blogs.categories.store');
	Route::get('/admin/blogs/categories/{category}/edit', 'BlogController@editCategory')->name('blogs.categories.edit');
	Route::patch('/admin/blogs/categories/{category}/update', 'BlogController@updateCategory')->name('blogs.categories.update');
	Route::delete('/admin/blogs/categories/{category}/destroy', 'BlogController@destroyCategory')->name('blogs.categories.destroy');
	Route::resource('/admin/blogs', 'BlogController');

	//PROFILES
	Route::get('/admin/profiles', 'ProfileController@index');
	Route::post('admin/profiles/{profile}/update', 'ProfileController@update')->name('profiles.update');

	//SETTINGS
	Route::get('/admin/sites', 'SettingController@index');
	Route::post('/admin/sites/{site}/update', 'SettingController@update')->name('sites.update');
	Route::post('/admin/sites/{site}/meta', 'SettingController@meta')->name('sites.meta');

	//ABOUTS
	Route::post('/admin/abouts/{about}/active', 'AboutController@active')->name('abouts.active');
	Route::resource('/admin/abouts', 'AboutController');

	//CUSTOMERS
	Route::resource('/admin/customers', 'CustomerController');

	//SERVICES
	Route::get('/admin/services/headers', 'ServiceController@header');
	Route::get('/admin/services/headers/create', 'ServiceController@createHeader')->name('services.headers.create');
	Route::post('/admin/services/headers/store', 'ServiceController@storeHeader')->name('services.headers.store');
	Route::get('/admin/services/headers/{header}/edit', 'ServiceController@editHeader')->name('services.headers.edit');
	Route::patch('/admin/services/headers/{header}/update', 'ServiceController@updateHeader')->name('services.headers.update');
	Route::post('/admin/services/headers/{header}/active', 'ServiceController@active')->name('services.headers.active');
	Route::delete('/admin/services/headers/{header}/destroy', 'ServiceController@destroyHeader')->name('services.headers.destroy');
	Route::resource('/admin/services', 'ServiceController');

	//TEAMS
	Route::get('/admin/teams/headers', 'TeamController@header');
	Route::get('/admin/teams/headers/create', 'TeamController@createHeader')->name('teams.headers.create');
	Route::post('/admin/teams/headers/store', 'TeamController@storeHeader')->name('teams.headers.store');
	Route::get('/admin/teams/headers/{header}/edit', 'TeamController@editHeader')->name('teams.headers.edit');
	Route::patch('/admin/teams/headers/{header}/update', 'TeamController@updateHeader')->name('teams.headers.update');
	Route::post('/admin/teams/headers/{header}/active', 'TeamController@active')->name('teams.headers.active');
	Route::delete('/admin/teams/headers/{header}/destroy', 'TeamController@destroyHeader')->name('teams.headers.destroy');
	Route::resource('/admin/teams', 'TeamController');

	//TESTIMONIALS
	Route::get('/admin/testimonials/headers', 'TestimonialController@header');
	Route::get('/admin/testimonials/headers/create', 'TestimonialController@createHeader')->name('testimonials.headers.create');
	Route::post('/admin/testimonials/headers/store', 'TestimonialController@storeHeader')->name('testimonials.headers.store');
	Route::get('/admin/testimonials/headers/{header}/edit', 'TestimonialController@editHeader')->name('testimonials.headers.edit');
	Route::patch('/admin/testimonials/headers/{header}/update', 'TestimonialController@updateHeader')->name('testimonials.headers.update');
	Route::post('/admin/testimonials/headers/{header}/active', 'TestimonialController@active')->name('testimonials.headers.active');
	Route::delete('/admin/testimonials/headers/{header}/destroy', 'TestimonialController@destroyHeader')->name('testimonials.headers.destroy');
	Route::resource('/admin/testimonials', 'TestimonialController');

	//PRODUCTS
	Route::get('/admin/products/headers', 'ProductController@header');
	Route::get('/admin/products/headers/create', 'ProductController@createHeader')->name('products.headers.create');
	Route::post('/admin/products/headers/store', 'ProductController@storeHeader')->name('products.headers.store');
	Route::get('/admin/products/headers/{header}/edit', 'ProductController@editHeader')->name('products.headers.edit');
	Route::patch('/admin/products/headers/{header}/update', 'ProductController@updateHeader')->name('products.headers.update');
	Route::post('/admin/products/headers/{header}/active', 'ProductController@active')->name('products.headers.active');
	Route::delete('/admin/products/headers/{header}/destroy', 'ProductController@destroyHeader')->name('products.headers.destroy');
	Route::resource('/admin/products', 'ProductController');

	//TREATMENTS
	Route::get('/admin/treatments/headers', 'TreatmentController@header');
	Route::get('/admin/treatments/headers/create', 'TreatmentController@createHeader')->name('treatments.headers.create');
	Route::post('/admin/treatments/headers/store', 'TreatmentController@storeHeader')->name('treatments.headers.store');
	Route::get('/admin/treatments/headers/{header}/edit', 'TreatmentController@editHeader')->name('treatments.headers.edit');
	Route::patch('/admin/treatments/headers/{header}/update', 'TreatmentController@updateHeader')->name('treatments.headers.update');
	Route::post('/admin/treatments/headers/{header}/active', 'TreatmentController@active')->name('treatments.headers.active');
	Route::delete('/admin/treatments/headers/{header}/destroy', 'TreatmentController@destroyHeader')->name('treatments.headers.destroy');
	Route::get('/admin/treatments/types', 'TreatmentController@types');
	Route::get('/admin/treatments/types/create', 'TreatmentController@createType')->name('treatments.types.create');
	Route::post('/admin/treatments/types/store', 'TreatmentController@storeType')->name('treatments.types.store');
	Route::get('/admin/treatments/types/{type}/edit', 'TreatmentController@editType')->name('treatments.types.edit');
	Route::patch('/admin/treatments/types/{type}/update', 'TreatmentController@updateType')->name('treatments.types.update');
	Route::delete('/admin/treatments/types/{type}/destroy', 'TreatmentController@destroyType')->name('treatments.types.destroy');
	Route::resource('/admin/treatments', 'TreatmentController');

	//SLIDERS
	Route::resource('/admin/sliders', 'SliderController');

	//GALLERIES
	Route::get('/admin/galleries/headers', 'GalleryController@header');
	Route::get('/admin/galleries/headers/create', 'GalleryController@createHeader')->name('galleries.headers.create');
	Route::post('/admin/galleries/headers/store', 'GalleryController@storeHeader')->name('galleries.headers.store');
	Route::get('/admin/galleries/headers/{header}/edit', 'GalleryController@editHeader')->name('galleries.headers.edit');
	Route::patch('/admin/galleries/headers/{header}/update', 'GalleryController@updateHeader')->name('galleries.headers.update');
	Route::post('/admin/galleries/headers/{header}/active', 'GalleryController@active')->name('galleries.headers.active');
	Route::delete('/admin/galleries/headers/{header}/destroy', 'GalleryController@destroyHeader')->name('galleries.headers.destroy');
	Route::get('/admin/galleries/tags', 'GalleryController@tags');
	Route::get('/admin/galleries/tags/create', 'GalleryController@createTag')->name('galleries.tags.create');
	Route::post('/admin/galleries/tags/store', 'GalleryController@storeTag')->name('galleries.tags.store');
	Route::get('/admin/galleries/tags/{tag}/edit', 'GalleryController@editTag')->name('galleries.tags.edit');
	Route::patch('/admin/galleries/tags/{tag}/update', 'GalleryController@updateTag')->name('galleries.tags.update');
	Route::delete('/admin/galleries/tags/{tag}/destroy', 'GalleryController@destroyTag')->name('galleries.tags.destroy');
	Route::resource('/admin/galleries', 'GalleryController');

	//RESERVATIONS
	Route::get('/admin/reservations/headers', 'ReservationController@header');
	Route::get('/admin/reservations/headers/create', 'ReservationController@createHeader')->name('reservations.headers.create');
	Route::post('/admin/reservations/headers/store', 'ReservationController@storeHeader')->name('reservations.headers.store');
	Route::get('/admin/reservations/headers/{header}/edit', 'ReservationController@editHeader')->name('reservations.headers.edit');
	Route::patch('/admin/reservations/headers/{header}/update', 'ReservationController@updateHeader')->name('reservations.headers.update');
	Route::post('/admin/reservations/headers/{header}/active', 'ReservationController@active')->name('reservations.headers.active');
	Route::delete('/admin/reservations/headers/{header}/destroy', 'ReservationController@destroyHeader')->name('reservations.headers.destroy');
	Route::post('/admin/reservations/{reservation}/cancel', 'ReservationController@cancel')->name('reservations.cancel');
	Route::post('/admin/reservations/{reservation}/confirm', 'ReservationController@confirm')->name('reservations.confirm');
	Route::post('/admin/reservations/{reservation}/finish', 'ReservationController@finish')->name('reservations.finish');
	Route::get('/admin/reservations/count', 'ReservationController@count')->name('reservations.count');
	Route::get('/admin/reservations/generate', 'ReservationController@generate')->name('reservations.generate');
	Route::resource('/admin/reservations', 'ReservationController');

	//MESSAGES
	Route::post('/admin/messages/{message}/update_confirm', 'ReservationMessageController@update_confirm')->name('confirm-message.update');
	Route::post('/admin/messages/{message}/update_dismiss', 'ReservationMessageController@update_dismiss')->name('dismiss-message.update');
	Route::resource('/admin/messages', 'ReservationMessageController');

	//MODES
	Route::post('/admin/reservations/{mode}/on', 'ReservationController@on')->name('reservations.on');
	Route::post('/admin/reservations/{mode}/off', 'ReservationController@off')->name('reservations.off');
});
