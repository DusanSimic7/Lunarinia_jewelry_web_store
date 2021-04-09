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

Route::get('/desibre', function(){

    return new App\Mail\SendOrderToOwner();

});


Route::get('/', 'HomeController@welcome');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::get('/collection/{collection}', 'CollectionController@show')->name('collection.show');
Route::get('/discount', 'DiscountController@discount')->name('discount.show');



Route::get('/items/{product}', 'ItemController@items')->name('items.show');

Route::get('/livewire', 'ItemController@livewire')->name('livewire');









Route::get('/single-item/{item}', 'ItemController@show')->name('item.show');
Route::get('/products', 'ProductController@index')->name('products');

Route::get('/make_alone', 'ItemController@make_alone');

Route::get('/about', 'ItemController@about');
Route::get('/frequently_questions', 'ItemController@frequently_questions');
Route::get('/contact', 'ItemController@contact');


Route::get('/proba', 'ItemController@proba');

Route::get('/cart', 'CartController@checkout');
Route::get('/my_cart', 'CartController@cart');
Route::post('/store_order', 'CartController@store_order');


Route::get('/create_item', 'AdminController@createItem');
Route::post('/post_item', 'AdminController@postItem');



Route::get('/edit_item', 'AdminController@indexEdit');

Route::get('/edit_create/{item}', 'AdminController@editCreate')->name('edit.create');

Route::put('/edit_item/{item}', 'AdminController@editItem')->name('edit.item');

Route::delete('/delete_item/{item}', 'AdminController@destroy')->name('delete.item');

Route::post('/contact_order', 'OrderController@sendOrder')->name('contact.order');
Route::post('/make_alone_order', 'OrderController@sendMakeAloneOrder')->name('make_alone.order');


// Routes for collections
Route::get('/collections', 'CollectionController@index')->name('collections');
Route::get('/read_collection', 'AdminController@readCollections')->name('read.collections');
Route::get('/create/collection', 'AdminController@createCollection')->name('create.collection');
Route::get('/edit_collection', 'AdminController@editMainCollection')->name('editMain.collection');
Route::post('/store/collection', 'AdminController@storeCollection')->name('store.collection');
Route::put('/update/mainCollection/{collection}', 'AdminController@updateMainCollection')->name('update.mainCollection');
Route::delete('/delete_collection/{collection}', 'AdminController@destroy_collection')->name('delete.collection');

// Routes for category

Route::get('/create/category', 'AdminController@createCategory')->name('create.category');
Route::post('/store/category', 'AdminController@storeCategory')->name('store.category');
Route::delete('/delete/category', 'AdminController@destroyCategory')->name('destroy.category');

// Route for seacrh button

Route::get('/search/item', 'ItemController@search')->name('search.item');




























