<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCrud\{ CreateUser, ListOfUsers, ViewUser, UpdateUser, DeleteUser};
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
    Route::get('/all-users', ListOfUsers::class)->name('all-users');
    Route::get('/user/create', [CreateUser::class, 'create'])->name('create-user');
    Route::post('/user/store', [CreateUser::class, 'store'])->name('store-user');
    Route::get('/user/infor/{id}', ViewUser::class)->name('view-user');
    Route::get('/user/{id}', [UpdateUser::class, 'edit'])->name('edit-user');
    Route::put('/user/{id}', [UpdateUser::class, 'update'])->name('update-user');
    Route::get('/user/delete/{id}', [DeleteUser::class, 'delete'])->name('delete-user');
    Route::delete('/user/delete/{id}', [DeleteUser::class, 'destroy'])->name('destroy-user');
   
});

require __DIR__.'/auth.php';
