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
Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/signup', function () {
    return view('registrarse');
});

// OLD KIND OF CALLS TO VIEWS
// Route::get('/log_in', function () {
//     return view('logeo');
// });

// Route::get('/profile', function () {
//     return view('perfil');
// });

// Route::get('/trends', function () {
//     return view('redsocial');
// });



// Route::get('/home', 'TemplateLaravelHomeController@index')->name('TemplateLaravelhome');

Route::post('/usersAll', 'ChatController@allUser');

Route::post('/send', 'ChatController@SendMessage');

Route::post('/messageLast', 'ChatController@LastMessage');

Route::post('/listenerNotify', 'ChatController@ListenerNotify');

//Autenticacion y diferenciacion de usuarios

Route::get('/login', 'AdminController@getLogin');
Route::post('/login', 'AdminController@postLogin');
Route::post('/signup', 'AdminController@postSignup');

Route::group( ['middleware' => 'auth' ], function(){
    
    // NEW KIND OF CALLS FOR VIEWS... STYLIZED!!!
    Route::post('/logout', 'AdminController@getLogout');
    Route::get('/profile', 'AdminController@getProfile');
    Route::get('/editprofile', 'AdminController@getProfiledit');
    Route::post('/profile/editname', 'AdminController@postStoreName');
    Route::post('/profile/editbirthdate', 'AdminController@postStoreBirthdate');
    Route::post('/profile/editstatusmarital', 'AdminController@postStoreStatusMarital');

    Route::get('/trends', 'AdminController@getTrends');
    Route::post('/fieldName', 'AdminController@getFieldsProfileName');
});