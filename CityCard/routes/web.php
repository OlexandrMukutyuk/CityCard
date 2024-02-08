<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
    Route::put('/update-ticket/{id}', [AdminController::class, 'updateConfirm'])->name('update_ticket');
    Route::get('/create-ticket', [AdminController::class, 'create'])->name('create_ticket');
    Route::post('/create-ticket', [AdminController::class, 'createConfirm'])->name('create_ticket');
});
