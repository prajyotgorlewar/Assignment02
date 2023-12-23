<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin', [
    AdminController::class, 'index'
])->middleware('auth')->name('admin');

Route::get('/admin/users', [
    AdminUsersController::class, 'index'
])->middleware('auth')->name('admin-users');

Route::get('/admin/users/create', [
    AdminUsersController::class, 'create'
])->middleware('admin')->name('admin-users-create');

Route::post('/admin/users/create', [
    AdminUsersController::class, 'store'
])->middleware('admin')->name('admin-users-create');

Route::get('/admin/users/{id}/edit', [
    AdminUsersController::class, 'edit'
])->middleware('admin')->name('admin-users-edit');

Route::patch('/admin/users/{id}/edit', [
    AdminUsersController::class, 'update'
])->middleware('admin')->name('admin-users-edit');
