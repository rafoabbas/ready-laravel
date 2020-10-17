<?php

use App\Http\Controllers\Manager\RoleController;
use App\Http\Controllers\Manager\SettingController;
use App\Http\Controllers\Manager\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\HomeController;

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


Route::group(['as' => 'manager.', 'middleware' => 'auth'], function (){
    Route::get('',[HomeController::class ,'index'])->name('home');

    Route::resources([
        'user'           => UserController::class,
        'role'           => RoleController::class,
    ]);

    Route::group(['prefix' => 'setting','as' => 'setting.'],function (){
        Route::get('general', [SettingController::class,'general'])->name('general');
        Route::post('general', [SettingController::class,'generalUpdate'])->name('general.update');
        Route::get('visual', [SettingController::class,'visual'])->name('visual');
        Route::post('visual', [SettingController::class,'visualUpdate'])->name('visual.update');
    });

});

