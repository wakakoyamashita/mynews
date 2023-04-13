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
    
// Laravel 09課題４【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。web.phpを編集して、
// admin/profile/create にアクセスしたら ProfileController の add Action に、
// admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください
use App\Http\controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->group(function()){
    Route::get('profile/create', 'add');
    Route::get('profile/edit', 'edit');    

// Laravel 09課題３「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbという
// Action に渡すRoutingの設定」を書いてみてください

Route::controller(AAAController::class)->group(function() {
    Route::get('XXX', 'bbb');
});


    
