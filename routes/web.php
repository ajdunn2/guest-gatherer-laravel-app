<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Regular user routes
Route::get('/dashboard', UserDashboard::class);

// Admin routes
//Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
//    Filament::routes();
//});
