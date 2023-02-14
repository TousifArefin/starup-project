<?php


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\AboutController as FrontendAboutController;

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

//
//frontend routes
Route::get('/',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');


Route::get('about',[FrontendAboutController::class,'index'])->name('about');



Route::get('contact',[App\Http\Controllers\Admin\ContactController::class,'index'])->name('contact-us');

Route::get('service/{slug}',[FrontendServiceController::class,'getService']);
Route::get('all/service',[FrontendServiceController::class,'AllService'])->name('all.service');


//backend routes
Route::get('dashboard',[DashboardController::class , 'index'])->name('admin.dashboard');
Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function(){
    Route::resource('slider', SliderController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('about', AboutController::class);
    Route::get('/service-new/{slug}',[ServiceController::class,'service'])->name('serviece-new');

});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('dashboard');
// });
