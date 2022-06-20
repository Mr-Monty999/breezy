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


///Home Routes


// Route::group(["middleware" => "counter"], function () {
Route::get('/', "HomeController@index")->name("home");
Route::get("/item/{id}/{name}", "HomeController@getProducts")->name("home.get.products");
// });







///Dashboard Routes

Route::group(["middleware" => "admin", "prefix" => "bzc"], function () {

    Route::get("/", "AdminController@dashboard")->name("dashboard.index");
    Route::get("/login", "AdminController@login")->name("dashboard.login");
    Route::post("/login/submit", "AdminController@attemptLogin")->name("dashboard.login.submit")->withoutMiddleware("admin");
    Route::get("/dashboard/logout", "AdminController@logout")->name("dashboard.logout");


    ////Admins Routes
    Route::get("/admin", "AdminController@privacy")->name("admin.privacy");
    Route::put("/admin/update", "AdminController@update")->name("admin.update");


    //Items Routes
    Route::get("/item", "ItemController@index")->name("item.index");
    Route::get("/item/edit/{id}", "ItemController@edit")->name("item.edit");
    Route::post("/item/store", "ItemController@store")->name("item.store");
    Route::put("/item/update/{id}", "ItemController@update")->name("item.update");
    Route::delete("/item/delete/{id}", "ItemController@delete")->name("item.delete");

    //Products Routes
    Route::get("/product", "ProductController@index")->name("product.index");
    Route::get("/product/edit/{id}", "ProductController@edit")->name("product.edit");
    Route::post("/product/store", "ProductController@store")->name("product.store");
    Route::put("/product/update/{id}", "ProductController@update")->name("product.update");
    Route::delete("/product/delete/{id}", "ProductController@delete")->name("product.delete");

    //Settings Routes
    Route::get("/setting", "SettingController@index")->name("setting.index");
    Route::put("/setting/update", "SettingController@update")->name("setting.update");
});
