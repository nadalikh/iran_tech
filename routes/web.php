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
Route::get("/", function(){
    return view('welcome');
});
Route::get("/temperature", [\App\Http\Controllers\msApiController::class, "getAllTemperature"])->name("allTemperature");
Route::get("/{lat}/{long}/{format}", [\App\Http\Controllers\msApiController::class, "temperature24H"])->name("apiCall");
