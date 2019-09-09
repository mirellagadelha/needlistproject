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
    return view('/index');
});

Route::get('/gerenciador', function () {
    return view('/lists/gerenciador');
});

Route::get('/visualizar', function () {
    return view('/lists/visualizar');
});

Route::get('/compartilhar', function () {
    return view('/lists/compartilhar');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::post('/saveImagesAndRedirectLogin', 'ListsController@saveImagesAndRedirectLogin')->name('saveImagesAndRedirectLogin');

Route::post('/savelist', 'ListsController@saveListUser')->name('savelist');

Route::post('ajaxRequestItems', 'ListsController@ajaxRequestItems');