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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\ShopController;
Route::controller(ShopController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('shop/create', 'add')->name('shop.add');
    Route::post('shop/create', 'create')->name('shop.create');
    Route::get('shop', 'index')->name('shop.index');
    Route::get('shop/edit', 'edit')->name('shop.edit');
    Route::post('shop/edit', 'update')->name('shop.update');
    Route::get('shop/delete', 'delete')->name('shop.delete');
});

// Laravel 09課題４【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。web.phpを編集して、
// admin/profile/create にアクセスしたら ProfileController の add Action に、
// admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください

use App\Http\Controllers\Admin\EventController;
Route::controller(Eventontroller::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('event/create', 'add')->name('event.add');
    Route::post('event/create', 'create')->name('event.create');
    Route::get('event/edit', 'edit')->name('event.edit');
    Route::post('event/edit', 'update')->name('event.update');
});

// Laravel 09課題３「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbという
// Action に渡すRoutingの設定」を書いてみてください

// Route::controller(AAAController::class)->group(function() {
//     Route::get('XXX', 'bbb');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ShopController as PublicNewsController;
Route::get('/', [PublicShopController::class, 'index'])->name('shop.index');

use App\Http\Controllers\EventController as PublicProfileController;
Route::get('/event', [PublicEventController::class, 'index'])->name('event.index');