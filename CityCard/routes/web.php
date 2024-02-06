<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

//авторизація
Auth::routes();

//роути користувача
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');


//роути адміна
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('index_admin');
    Route::delete('/delete-ticket/{id}', [AdminController::class, 'delete'])->name('delete_ticket');
    Route::post('/update-ticket/{id}', [AdminController::class, 'update'])->name('update_ticket');
    Route::put('/update-ticket/{id}', [AdminController::class, 'update_confirm'])->name('update_ticket');
    Route::get('/create-ticket', [AdminController::class, 'create'])->name('create_ticket');
    Route::post('/create-ticket', [AdminController::class, 'create_confirm'])->name('create_ticket');


});
