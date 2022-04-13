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

Route::get('/', 'homepage@Index');
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/shopDetail', function () {
    return view('shopDetail');
});
Route::get('/ShoppingCart','ShoppingCartController@shoppingcart');
Route::get('/checkout',function(){
    return view('checkout');
});
Route::get('/blogeDetail',function(){
    return view('blogeDetail');
});
Route::get('/bloge',function(){
    return view('bloge');
});
Route::get('/contact',function(){
    return view('contact');
});


/*--- admin rout --*/

Route::get('/admins',function(){
    return view('admin.index');
});
Route::get('/ticketlist',function(){
    return view('admin.ticketlist');
});
Route::get('/chat',function(){
    return view('admin.chat');
});
Route::get('/calenda',function(){
    return view('admin.calenda');
});
Route::get('/addproducts',function(){
    return view('admin.addproducts');
});
Route::get('/listproducts',function(){
    return view('admin.listproducts');
});
Route::resource('/image','imageController');
Route::resource('/category','categoryController');
Route::get('/category/endisable/{id}','categoryController@endisable')->name('category.endisable');
Route::get('/login',function(){
    return view('admin.login');
});
Route::get('/register',function(){
    return view('admin.register');
});
Route::get('/documentation',function(){
    return view('admin.documentation');
});