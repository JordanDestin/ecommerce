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
Auth::routes();

//Route::post('/register', 'Auth\RegisterController@createUser')->name('test.user');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('produit/{id}', 'ProductController@show')->name('products.show');
Route::get('search', 'ProductController@search')->name('products.search');


Route::group(['middleware' =>['auth']], function(){
    Route::get('addresse-livraison', 'AddressController@index')->name('address.index');
    Route::post('ajouter-addresse', 'AddressController@store')->name('address.store');

    Route::get('mon-panier', 'CartController@index')->name('cart.index');
    Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
    Route::patch('panier/{rowId}', 'CartController@update')->name('cart.update');
    Route::delete('/supprimer-article/{rowId}' ,'CartController@destroy')->name('cart.destroy');

    
    Route::get('/paiement' , 'PaymentController@index')->name('payment.index');
    Route::post('/payment' ,'PaymentController@store')->name('checkout.store');
    Route::get('/merci', 'PaymentController@thankYou')->name('checkout.thankYou');

    Route::get('mon-compte', 'AccountController@index')->name('account.index');
    Route::get('mon-addresse', 'AccountController@addressUser')->name('account.address');
});



// BACK
Route::view('admin', 'back.index')->name('admin');

Route::get('shop', 'Back\ShopController@index')->name('shop.index'); 

Route::get('admin-products', 'Back\ProductController@index')->name('list.product'); 
Route::get('create-products', 'Back\ProductController@create')->name('create.product');
Route::get('modify-products/{id}', 'Back\ProductController@edit')->name('edit.product');
Route::post('add-products', 'Back\ProductController@store')->name('add.product');
Route::post('update-products/{id}', 'Back\ProductController@update')->name('update.product');
Route::delete('destroy-product/{id}','Back\ProductController@destroy')->name('destroy.product');

Route::get('admin-category', 'Back\CategoryController@index')->name('list.categories'); 
Route::get('create-category', 'Back\CategoryController@create')->name('create.category');
Route::post('add-category', 'Back\CategoryController@store')->name('add.category');
Route::get('modify-category/{id}', 'Back\CategoryController@edit')->name('edit.category');
Route::post('update-category/{id}', 'Back\CategoryController@update')->name('update.category');
Route::delete('destroy-category/{id}','Back\CategoryController@destroy')->name('destroy.category');

