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

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('get-recommendation', 'RecommendationController@getRecommendation')->name('get.recommendation');

Route::get('logout', 'AuthController@doLogout')->name('do.logout');

Route::middleware('check.login')->group(function (){
    Route::get('login', 'AuthController@getLogin')->name('login')->middleware('guest');
    Route::post('login', 'AuthController@doLogin')->name('do.login');
    Route::get('register', 'AuthController@getRegister')->name('register');
    Route::post('register', 'AuthController@doRegister')->name('do.register');
    Route::get('reset-password', 'AuthController@getResetPassword')->name('reset.password');
    Route::post('reset-password', 'AuthController@doResetPassword')->name('do.reset.password');
});


Route::get('oauth/{provider}', 'OAuthController@redirectToProvider')->name('oauth.provider.redirect');
Route::get('oauth/{provider}/callback', 'OAuthController@handleProviderCallback')->name('oauth.provider.callback');

Route::get('search', 'SearchController@doSearch')->name('do.search');

Route::get('kategori', 'KategoriController@index')->name('kategori.index');
Route::get('kategori/{slug}', 'KategoriController@show')->name('kategori');

Route::get('sub-kategori', 'SubKategoriController@index')->name('sub.kategori.index');
Route::get('sub-kategori/{slug}', 'SubKategoriController@show')->name('sub.kategori');

Route::get('direktori', 'DirektoriController@index')->name('direktori.index');
Route::get('direktori/{alphabet}', 'DirektoriController@show')->name('direktori.show');

Route::get('lembaga/{slug}', 'LembagaController@show')->name('lembaga.show');

Route::post('lembaga/{slug}/feedback', 'FeedbackController@doFeedback')->name('do.feedback');

Route::get('tentang', 'InformationController@pageAbout')->name('page.about');
Route::get('sumber-pengolahan-data', 'InformationController@pageSumberPengolahanData')->name('page.sumber.pengolahan.data');