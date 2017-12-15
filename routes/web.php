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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get("/buscador", "ProductsController@search");

Route::post("/agregarACarrito", "CartController@add");
Route::post("/quitarCarrito", "CartController@remove");
Route::get("/carrito", "CartController@list");

Route::get("/productos", "ProductsController@list");
Route::get("/productos/buscador", "ProductsController@search");
Route::get("/productos/{seccion}", "ProductsController@productsByDepartment");
Route::get("/producto/{id}", "ProductsController@detailsProduct");
Route::patch("/editarProducto", "ProductsController@updateProduct");
Route::get("/editarProducto/{id}", "ProductsController@editProduct");
Route::get("/borrarProducto/{id}", "ProductsController@deleteProduct");
Route::get("/agregarProducto", "ProductsController@addProduct");
Route::post("/agregarProducto", "ProductsController@saveProduct");

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get("/register/admin", "RegisterAdminController@add");
Route::post("/register/admin", "RegisterAdminController@store");

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/tyc', function () {
    return view('tyc');
});


Route::get('/profile', 'UserController@profile');

Route::get('password', 'UserController@password');
Route::post('updatepassword', 'UserController@updatePassword');

Route::get('avatar', 'UserController@avatar');
Route::post('updateavatar', 'UserController@updateAvatar');

Route::get('infoprofile', 'UserController@infoProfile');
Route::post('updateinfoprofile', 'UserController@updateInfoProfile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
