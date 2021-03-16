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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', 'ProductController@index')->name('home');
Route::get('produits/', 'ProductController@index')->name('products.index');
Route::get('produit/{slug}', 'ProductController@show')->name('products.show');
Route::get('search', 'ProductController@search')->name('products.search');


Route::group(['middleware' =>['auth']], function(){
    Route::get('mon-panier', 'CartController@index')->name('cart.index');
    Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
    Route::patch('panier/{rowId}', 'CartController@update')->name('cart.update');
    Route::delete('/supprimer-article/{rowId}' ,'CartController@destroy')->name('cart.destroy');

    
    Route::get('/paiement' , 'PaymentController@index')->name('payment.index');
    Route::post('/payment' ,'PaymentController@store')->name('checkout.store');
    Route::get('/merci', 'PaymentController@thankYou')->name('checkout.thankYou');
});



Route::get('/home', 'HomeController@index')->name('home');
