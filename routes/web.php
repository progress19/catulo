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

Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::match(['get', 'post'], '/admin/login', 'AdminController@login');
Route::match(['get', 'post'], '/login', 'AdminController@login')->name('login');

Route::get('/logout', 'AdminController@logout');

Route::group(['middleware' => ['auth']], function() {
    
    /* DATATABLES */
    Route::get('dataUsuarios', 'UsuarioController@getData')->name('dataUsuarios');
    Route::get('dataImagenesHome', 'ImgsHomeController@getData')->name('dataImagenesHome');
    Route::get('dataShows', 'ShowController@getData')->name('dataShows');
    Route::get('dataTraducciones', 'TraduccionController@getData')->name('dataTraducciones');
    Route::get('dataMenu', 'MenuController@getData')->name('dataMenus');
    Route::get('dataReservas', 'ReservaController@getData')->name('dataReservas');
    Route::get('dataSuscripciones', 'SuscripcionController@getData')->name('dataSuscripciones');

    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/edit-user', 'AdminController@editUser');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::match(['get','post'], '/admin/update-pwd', 'AdminController@updatePassword');

    Route::get('/admin/reset-pwd','AdminController@resetPassword');

    //Reservas Routes (Admin)
    Route::get('/admin/view-reservas','ReservaController@viewReservas');
    Route::match(['get','post'],'/admin/edit-reserva/{id}','ReservaController@editReserva');
    Route::match(['get','post'],'/admin/delete-reserva/{id}','ReservaController@deleteReserva');

    //Usuarios Routes (Admin)
    Route::match(['get','post'],'/admin/add-usuario','UsuarioController@addUsuario');
    Route::match(['get','post'],'/admin/edit-usuario/{id}','UsuarioController@editUsuario');
    Route::match(['get','post'],'/admin/delete-usuario/{id}','UsuarioController@deleteUsuario');
    Route::get('/admin/view-usuarios','UsuarioController@viewUsuarios');

    //Imagenes Home Routes (Admin)
    Route::match(['get','post'],'/admin/add-imgHome','ImgsHomeController@addImgHome');
    Route::match(['get','post'],'/admin/edit-imgHome/{id}','ImgsHomeController@editImgHome');
    Route::match(['get','post'],'/admin/delete-imgHome/{id}','ImgsHomeController@deleteImgHome');
    Route::get('/admin/view-imgsHome','ImgsHomeController@viewImgsHome');

    //Shows Routes (Admin)
    Route::match(['get','post'],'/admin/add-show','ShowController@addShow');
    Route::match(['get','post'],'/admin/edit-show/{id}','ShowController@editShow');
    Route::match(['get','post'],'/admin/delete-show/{id}','ShowController@deleteShow');
    Route::get('/admin/view-shows','ShowController@viewShows');

    //Traducciones Routes (Admin)
    Route::match(['get','post'],'/admin/add-traduccion','TraduccionController@addTraduccion');
    Route::match(['get','post'],'/admin/edit-traduccion/{id}','TraduccionController@editTraduccion');
    Route::match(['get','post'],'/admin/delete-traduccion/{id}','TraduccionController@deleteTraduccion');
    Route::get('/admin/view-traducciones','TraduccionController@viewTraducciones');

    //Menus
    Route::get('/admin/view-menus','MenuController@viewMenus');
    Route::match(['get','post'],'/admin/edit-menu/{id}','MenuController@editMenu');

    //Suscripciones Routes (Admin)
    Route::get('/admin/view-suscripciones', 'SuscripcionController@viewSuscripciones');
    Route::match(['get','post'],'/admin/delete-suscripcion/{id}','SuscripcionController@deleteSuscripcion');
    Route::get('admin/exportarSuscriptos', 'SuscripcionController@exportarSuscriptos');

});

Route::post('enviarContacto', 'Controller@enviarContacto');
Route::post('calculateTotal', 'ShowController@calculateTotal');
Route::post('enviarReserva', 'Controller@enviarReserva');
Route::post('enviarSuscribir', 'SuscripcionController@enviarSuscribir');
Route::post('capturePayPal', 'Controller@capturePaypal')->name('capturePayPal');

Route::redirect('/', app()->getLocale());

Route::get('vue', function () {
    return view('vue');
});

Route::get('react', function () {
    return view('react');
});

Route::group(['prefix' => '{language}'], function () {
    
    Route::get('/', ['uses' => 'Controller@viewHome'])->name('index');
    Route::get('home', ['uses' => 'Controller@viewHome'])->name('home');
    Route::get('menu', ['uses' => 'MenuController@viewMenu'])->name('menu');
    Route::get('show/{id}/{slug}', 'ShowController@viewShow')->name('show');
    //Route::match(['get','post'],'show/{id}/{slug}','ShowController@viewShow')->name('show');
    Route::get('eventos', ['uses' => 'Controller@viewEventos'])->name('eventos');

    Route::get('testEmail', ['uses' => 'Controller@testEmail'])->name('testEmail');

});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


