<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardBuyerController;
use App\Http\Controllers\DashboardConcert;
use App\Http\Controllers\DashboardConcertController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardTicketController;
use App\Http\Controllers\DashboardTicketController2;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//   return view("guest.home", ['active' => 'home']);
// });
Route::get('/', [GuestController::class, 'index'])->name('home');

// dd(Auth::user());
//group rout untuk yang belum login
Route::group(['middleware' => 'guest'], function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'login']);
  Route::get('/beli/{id_product}', [CheckoutController::class, 'product_detail'])->name('buyer_product_detail');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


//group route untuk login 
Route::group(['middleware' => 'auth'], function () {
  // Route::get('/', [DashboardController::class, 'index']);
  //jika login sebagai admin
  //start of admin routes
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
  //end of admin routes
  Route::post('/logout', [LoginController::class, 'logout']);
});

// Route::group(['middleware' => 'auth', 'prefix' => 'dashboard/tickets'], function () {
//   Route::get('/', [DashboardTicketController::class, 'index']);
//   route::get('/{id}', [DashboardTicketController::class, 'show']);
// });

Route::resource('/dashboard/concerts', DashboardConcertController::class)->middleware('auth');
Route::resource('/dashboard/tickets', DashboardTicketController2::class)->middleware('auth');
Route::resource('/dashboard/buyers', DashboardBuyerController::class)->middleware('auth');
