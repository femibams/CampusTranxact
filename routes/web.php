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
  

Route::get('/home','HomeController@index');
Route::get('/StudentRegister','HomeController@create');
Route::post('/StudentRegister','HomeController@store');
Route::get('/BusinessRegister','HomeController@homecreate');
Route::post('/BusinessRegister','HomeController@homestore');


Route::get('/ProductForm','ProductController@create')->middleware('auth');
Route::post('/ProductForm','ProductController@store');
Route::get('/ProductShow/{id}','ProductController@show');

Route::get('/Category/{id}','CategoryController@show');

Route::get('/Profile','ProfileController@index');
Route::get('/User_Ads','ProfileController@show');

Route::get('/edit_ad/{id}', 'ProductController@edit');
Route::post('/product_update', 'ProductController@update');
Route::get('/delete/{id}', 'ProductController@delete');

Route::post('/details_update', 'UserController@details');
Route::post('/password_update', 'UserController@update');

Route::get('/product_search','HomeController@search');

Route::get('/sendmail','EmailController@send');
Route::get('logout','Auth\LoginController@logout');

Route::get('/public/{url}',function($url){
    $path=storage_path().'/app/public/'.$url;

    if(!File::exists($path)){
        abort(404);
    }$file = File::get($path);
    $type = File::mimeType($path);
        $response = Response::make($file,200);
        $response->header("Content-Type",$type);

        return $response;
});

     

   Auth::routes();
   

//Route::post('/register','Auth\RegisterController@register');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@index');