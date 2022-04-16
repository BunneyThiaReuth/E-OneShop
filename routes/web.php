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
Route::resource('/shop','shopController');
Route::get('/shop/shop/{id}','shopController@like')->name('shop.like');
Route::get('/shop/shipping/{id}','shopController@shipping')->name('shop.shipping');
Route::resource('/shopDetail','shopDetailController');
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
Route::resource('/infor','infoController');
Route::get('/infor/infor/{id}','infoController@endisable')->name('infor.endisable');
Route::resource('/sliders','sliderController');
Route::get('/sliders/sliders/{id}','sliderController@endisable')->name('sliders.endisable');
Route::resource('/addproducts','addProductsController');
Route::resource('/discount','discountController');
Route::get('/discount/endisable/{id}','discountController@endisable')->name('discount.endisable');
Route::resource('/listproducts','listProdcutsController');
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