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

// Route::group(['namespace' => 'Site'],function()
// {
//     Route::get('/', 'HomeController')->name('site.home');

//     Route::get('produtos', 'CategoryController@index')->name('site.products');
//     Route::get('produtos/{category:slug} ', 'CategoryController@show')->name('site.products.category');

//     Route::get('blog', 'BlogController')->name('site.blog');

//     Route::view('sobre', 'site.about.index')->name('site.about');

//     Route::get('coapp\Http\Controllers\ntato', 'ContactController@index')->name('site.contact');
//     Route::post('contato', 'ContactController@form')->name('site.contact.form');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'DashboardController@index')
    ->name('dashboard');
});
// for users
Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/dashboard/myprofile', 'DashboardController@myprofile')
    ->name('dashboard.myprofile');
});

// for Blog Writers (Editors)
Route::group(['middleware' => ['auth', 'role:blogwriters']], function(){
    Route::get('/dashboard/postcreate', 'DashboardController@postcreate')
    ->name('dashboard.postcreate');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
