<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('users', UserController::class);
Route::resource('member', MemberController::class);
Route::resource('users', UserController::class)->except('show');
Route::resource('produk', ProdukController::class)->except('show');
Route::resource('lelang', LelangController::class);
Route::get('/trash/member', 'TrashController@member')->name('trash.member');
Route::post('/trash/member/{id}', 'TrashController@memberRestore')->name('trash.member.restore');
Route::delete('/trash/member/{id}', 'TrashController@memberDestroyPermanent')->name('trash.member.destroy.permanent');
Route::get('/trash/user', 'TrashController@user')->name('trash.user');
Route::post('/trash/user/{id}', 'TrashController@userRestore')->name('trash.user.restore');
Route::delete('/trash/user/{id}', 'TrashController@userDestroyPermanent')->name('trash.user.destroy.permanent');
