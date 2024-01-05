<?php

use App\Livewire\InviteForm;
use App\Livewire\UserDashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/', UserDashboard::class);

Route::get('/invite/{slug}', InviteForm::class);

// route named 'ical-download'
Route::get(
    'ical',
    [\App\Http\Controllers\EventCal::class, 'calendar']
    )->name('ical-download');
