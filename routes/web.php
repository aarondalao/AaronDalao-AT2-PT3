<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\LandingPageController;
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

Route::get('/', [LandingPageController::class,'home'])->name('home');
Route::get('/TermsOfUse', fn() => view('landingPage.terms-of-use'))->name('termsOfUse');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
    // collectors resources
    Route::resource('collectors',CollectorController::class);
    Route::get('/collectors/{collector}/delete', [CollectorController::class,'delete'])
        ->name('collectors.delete');

    //cars resources
    Route::resource('cars', CarController::class);
    Route::get('/cars/{car}/delete', [CarController::class,'delete'])
        ->name('cars.delete');

    // crude way to use reuse landingPageController whether if the user is authenticated or not.
    // research about accessing the same view/controller with or without authentication
//    Route::get('/dashboard',[landingPageController::class,'getAllForDashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';
