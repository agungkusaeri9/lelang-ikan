<?php

use App\Member;
use App\Produk;
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

Route::redirect('/', '/login');
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('isactive');
    Route::middleware('role:master admin')->group(function(){
        Route::resource('users', UserController::class)->except('show');
        Route::resource('pemenang-lelang', PemenangLelangController::class)->except('show');
        Route::post('pemenang-lelang/set/{id}','PemenangLelangController@store')->name('pemenang-lelang.store');
        Route::resource('m-setting', MSettingController::class)->except('show');
        Route::delete('/trash/user/{id}', 'TrashController@userDestroyPermanent')->name('trash.user.destroy.permanent');
        Route::get('/trash/user', 'TrashController@user')->name('trash.user');
        Route::post('/trash/user/{id}', 'TrashController@userRestore')->name('trash.user.restore');
    });
    Route::middleware('role:admin|master admin')->group(function(){
        Route::resource('member', MemberController::class);
        Route::resource('produk', ProdukController::class)->except('show');
        Route::resource('lelang', LelangController::class);
        Route::get('/trash/member', 'TrashController@member')->name('trash.member');
        Route::post('/trash/member/{id}', 'TrashController@memberRestore')->name('trash.member.restore');
        Route::delete('/trash/member/{id}', 'TrashController@memberDestroyPermanent')->name('trash.member.destroy.permanent');
        Route::get('/trash/produk', 'TrashController@produk')->name('trash.produk');
        Route::post('/trash/produk/{id}', 'TrashController@produkRestore')->name('trash.produk.restore');
        Route::delete('/trash/produk/{id}', 'TrashController@produkDestroyPermanent')->name('trash.produk.destroy.permanent');
    });

    Route::middleware(['isactive','role:member|master admin|admin'])->group(function(){
        Route::get('log/bidding', 'LogBiddingController@index')->name('log-bidding.index');
        Route::get('produk-lelang', 'ProdukLelangController@index')->name('produk-lelang.index');
        Route::get('produk-lelang/{id}/{id_lelang}', 'ProdukLelangController@show')->name('produk-lelang.show');
        Route::post('produk-lelang/{id}/{id_lelang}', 'ProdukLelangController@bid')->name('produk-lelang.bid');
    });
    
    
        
});
