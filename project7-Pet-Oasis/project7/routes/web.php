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
// public routes
Route::get('/', function () {
    return view('public.home');
});


Route::resource('shop', 'ShopController');
Route::get('single_product/{id}', 'SingleProductController@index');
Route::get('/products/{id?}/{cat_id?}', 'ProductsController@index');

Route::resource('manage_shop', 'ManageShopController');
Route::resource('manage_sub_categories', 'ManageSubCategoryController');
Route::resource('manage_products', 'ManageProductController');

//To Show All post
Route::get('/posts/{post_typ?}/', 'PostsController@index');

//Store post
Route::post('/posts/{post_typ}','PostsController@store');

//Single Page For post
Route::get('/posts/single_page_post/{id}', 'PostsController@show');

//Delete comment
Route::get('/posts/single_page_post/delete/{id}', 'CommentsController@destroy');

//Delete in posts page
Route::get('/posts/{post_type}/delete/{id}', 'CommentsController@destroy');

//To show Comment
Route::get('/Comment/{user_id}/{post_type}', 'CommentsController@show');

//To Add Comment
Route::post('/storeComment/{post_id}/{post_type}', 'CommentsController@store');


Route::get('/', function () {
    return view('public.home');
});

Route::get('/aboutus', function () {
    return view('public.aboutUs');
});

Route::get('/profile', function () {
    return view('public.profile');
})->middleware('auth');

Route::get('/vendor_register', function () {
    return view('public.vendor');
});

Route::post('/profile', 'UserController@update_image');


// admin routes
Route::resource('adminside', 'AdminController')->middleware('auth');
Route::resource('user', 'UsersController')->middleware('auth');
Route::get('vendor/{id}/approve', 'VendorsController@approve')->middleware('auth');
Route::resource('vendor', 'VendorsController')->middleware('auth');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
