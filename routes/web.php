<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'frontend\FrontendController@index');
Route::get('/home', 'frontend\FrontendController@index');


Auth::routes();


Route::middleware('isAdmin')->group(function (){
    
    Route::get('/dashboard','admin\FrontendController@index')->name('Dashboard');   
    
    // Route category Start
    Route::get('/category','admin\CategoryController@index')->name('Category');
    Route::get('/category/add','admin\CategoryController@add')->name('Category');
    Route::post('/category/added','admin\CategoryController@added')->name('Category');
    route::get('/category/edit/{id}','admin\CategoryController@edit')->name('Category');
    route::post('/category/edited','admin\CategoryController@edited')->name('Category');
    route::get('/category/delete/{id}','admin\CategoryController@delete');
    // Route category end


    // Route Product Start
    Route::get('/product','admin\ProductController@index')->name('Product');
    Route::get('/product/add','admin\ProductController@add')->name('Product');
    Route::post('/product/added','admin\ProductController@added');
    Route::get('/product/edit/{id}','admin\ProductController@edit')->name('Product');
    Route::post('/product/edited','admin\ProductController@edited');
    Route::get('/product/delete/{id}','admin\ProductController@delete');


    Route::get('/order_admin','admin\OrderController@index')->name('Order');
    Route::get('/order_history','admin\OrderController@history')->name('Order History');
    Route::get('/order_admin/detail/{id}','admin\OrderController@detail')->name('Order');
    Route::post('/order/completed/{id}','admin\OrderController@edit')->name('Order');

    Route::get('/users','admin\UserController@index')->name('User');
    Route::get('/user/{id}','admin\UserController@detail')->name('User');
});



Route::get('/category/{name}','frontend\FrontendController@productByCategory');

Route::middleware('auth')->group(function (){
    Route::get('/product_detail/{id}','frontend\ProductController@index');
    
    Route::post('/cart/add','frontend\CartController@addProduct');
    Route::get('/cart','frontend\CartController@index');
    Route::post('/cart/delete','frontend\CartController@delete');
    Route::post('/cart/update','frontend\CartController@update');

    Route::get('/checkout','frontend\CheckoutController@index');
    Route::Post('/save/address','frontend\CheckoutController@saveAddress');

    Route::get('/order','frontend\OrderController@index');
    Route::get('/order/detail/{id}','frontend\OrderController@detail');

    Route::get('/wishlist','frontend\WishlistController@index');
    Route::post('/wishlist/add','frontend\WishlistController@add');
    Route::post('/wishlist/delete','frontend\WishlistController@delete');

    Route::get('/status','HomeController@status');


    Route::post('/pay','frontend\PaymentController@pay');

    Route::post('/review','frontend\ReviewController@add');



    Route::post('/slug','frontend\SearchController@slug');
    Route::post('/search','frontend\SearchController@search');
    


});