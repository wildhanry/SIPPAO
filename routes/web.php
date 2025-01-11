<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/pkb', function () {
    return view('info.pkb');
});

Route::get('/rpp', function () {
    return view('info.rpp');
});

Route::get('/tu', function () {
    return view('info.tu');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'userMiddleware'])->group(function () {

    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::get('datas', [DataController::class, 'index'])->name('user.datas');
});

Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route untuk data
    Route::get('/admin/datas', [DataController::class, 'index'])->name('admin/datas');
    Route::get('/admin/datas/create', [DataController::class, 'create'])->name('admin/datas/create');
    Route::post('/admin/datas/save', [DataController::class, 'save'])->name('admin/datas/save');
    Route::get('/admin/datas/edit/{id}', [DataController::class, 'edit'])->name('admin/datas/edit');
    Route::put('/admin/datas/edit/{id}', [DataController::class, 'update'])->name('admin/datas/update');
    Route::put('/admin/users/{id}', [DataController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/admin/datas/delete/{id}', [DataController::class, 'delete'])->name('admin/datas/delete');

    // Route untuk user
    Route::get('/admin/users', [DataController::class, 'listUsers'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [DataController::class, 'editUser'])->name('admin.users.edit');
    Route::delete('/admin/users/{id}', [DataController::class, 'deleteUser'])->name('admin.users.delete');
});
