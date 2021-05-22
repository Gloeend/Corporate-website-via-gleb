<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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
})->name('home');

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthController::class, 'login']);
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'register'])->name('register');


    Route::get('logout', [AuthController::class, 'logout']);

});


Route::get('news', [NewsController::class, 'index'])->name('news');
