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


Route::any("Admin/login","AdminController@login")->name("admin.login");
Route::any("Admin/logout","AdminController@logout")->name("admin.logout");
Route::any("Admin/reg","AdminController@reg")->name("admin.reg");
Route::any("Admin/ar/{id}","AdminController@ar")->name("admin.ar");

Route::any("Admin/index","AdminController@index")->name("admin.index");
Route::any("Admin/edit/{id}","AdminController@edit")->name("admin.edit");
Route::get("Admin/del/{id}","AdminController@del")->name("admin.del");


Route::get("Admin/user","AdminController@user")->name("admin.user");
Route::any("Admin/userAdd","AdminController@userAdd")->name("admin.userAdd");
Route::any("Admin/userEdit/{id}","AdminController@userEdit")->name("admin.userEdit");
Route::get("Admin/userDel/{id}","AdminController@userDel")->name("admin.userDel");
Route::any("Admin/recharge/{id}","AdminController@recharge")->name("admin.recharge");
Route::any("Admin/consume/{id}","AdminController@consume")->name("admin.consume");

Route::any("Record/index/{id}","RecordController@index")->name("record.index");
Route::get("Record/del/{id}","RecordController@del")->name("record.del");
//Route::any("Admin/record/{id}","AdminController@record")->name("admin.record");


Route::get("meal/index","MealController@index")->name("meal.index");
Route::any("meal/edit/{id}","MealController@edit")->name("meal.edit");
Route::get("meal/del/{id}","MealController@del")->name("meal.del");
Route::any("meal/add","MealController@add")->name("meal.add");