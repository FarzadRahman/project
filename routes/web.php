<?php


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TestController;
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

//Route::get('/', function () {
//    return view('dashboard');
//})->name('dashboard');
Auth::routes();
//Route::get('employee', [TestController::class, 'index']);
Route::get('/', [HomeController::class,'index']);
Route::resource('employees', EmployeeController::class);

//Route::get('/test', 'TestController@index');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');