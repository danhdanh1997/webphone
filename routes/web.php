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

Route::get('login',[
    'as'=>'login',
    'uses'=>'LoginController@getlogin',
    'middleware'=>'CheckedLogin'
]);

Route::post('login',[
    'as'=>'login',
    'uses'=>'LoginController@postlogin',
    'middleware'=>'CheckedLogin'
]);

Route::get('logout',[
    'as'=>'Dang xuat',
    'uses'=>'HomeController@getlogout',
    'middleware'=>'Checkedlogout'
]);

Route::get('home',[
    'as'=>'trangchu',
    'uses'=>'HomeController@gethome'
    
]);


Route::group(['prefix'=>'categori'],function(){
    Route::get('/','CategoriController@getcate');
    Route::post('/','CategoriController@postcate');
    Route::get('edit/{cate_id}','CategoriController@getedit');
    Route::get('edit','CategoriController@getedit');
    Route::post('edit/{cate_id}','CategoriController@postedit');
    Route::get('delete/{id}','CategoriController@getdelete');
});


Route::group(['prefix'=>'product'],function(){
    Route::get('/','ProductController@getproduct');

    Route::get('add','ProductController@getaddproduct');
    Route::post('add','ProductController@postaddproduct');

    Route::get('edit/{id}','ProductController@geteditproduct');
    Route::post('edit/{id}','ProductController@posteditproduct');
    
    Route::get('delete/{id}','ProductController@getdeleteproduct');
});

Route::get('/','FrontendController@getHome');


Route::get('detail/{id}','FrontendController@getDetail');

Route::post('detail/{id}','FrontendController@postcomment');

Route::get('search','FrontendController@getsearch');

Route::get('complete','CartController@getcomplete');

Route::get('category/{id}','FrontendController@getcategory');


Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}','CartController@getaddcart');
    Route::get('show','CartController@getshowCart');
    Route::get('delete/{id}','CartController@getdeleteCart');
    Route::get('update','CartController@getupdatecart');
    Route::post('show','CartController@postshowCart');
});

Route::post('complete','CartController@getcomplete');

Route::get('register',[
    'as'=>'register',
    'uses'=>'RegisterController@getregister',
]);
   
Route::post('register',[
    'as'=>'register',
    'uses'=>'RegisterController@postregister',
]);

// Route::get('callback/{social}','UserController@handleProviderCallback');
// Route::get('login/{social}','UserController@redirectProvider')->name('login.social');

// Route::get('login/{provider}', [
// 	'as'=>'provider_login',
// 	'uses'=>'UserController@redirectToProvider'
// ]);
// Route::get('login/{provider}/callback', [
// 	'as'=>'provider_login_callback',
// 	'uses'=>'UserController@handleProviderCallback'
// ]);

Route::get('auth/facebook', 'UserController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'UserController@handleProviderCallback');
