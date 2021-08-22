<?php

use App\Http\Controllers\PublicHolidayController;
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
    return view('app');
});

Route::get('/holidays/{year}', [
    PublicHolidayController::class, 'getHolidays'
])->where('year', '[0-9]+');

Route::get('/holidays/download/{year}', [
    PublicHolidayController::class, 'downloadHolidaysPDF'
])->where('year', '[0-9]+');
