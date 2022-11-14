<?php


use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AgentController;
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
Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::post('/company/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');

Route::get('/agent', [App\Http\Controllers\AgentController::class, 'index'])->name('agent.index');
Route::post('/agent/store', [App\Http\Controllers\AgentController::class, 'store'])->name('agent.store');

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
Route::get('/events/edit/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
Route::post('/events/store', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');
