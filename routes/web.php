<?php

use App\Http\Controllers\TodoController;
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
Route::middleware('isGuest')->group(function(){
Route::get('/', [TodoController::class, 'index']);
Route::get('/register', [TodoController::class, 'register']);
Route::post('/register/input', [TodoController::class, 'registerAccount'])->name('register.input');
Route::post('/login/auth', [TodoController::class, 'auth'])->name('login.auth');
});



Route::get('/logout', [TodoController::class, 'logout'])->name('logout');

Route::middleware('isLogin')->prefix('/todo')->name('todo.')->group(function(){
Route::get('/', [TodoController::class, 'dashboard'])->name('index');
Route::get('/create', [TodoController::class, 'create']);
Route::post('/store', [TodoController::class, 'store'])->name('store');
//Route path yang menggunakan {} berarti dia berperan sebagai parameter route
//parameter ini bentuknya data dinamis (data yang dukurum ke route untuk diambil di parameter function controller terkain)
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
Route::get('delete/{id}', [TodoController::class, 'destroy'])->name('delete');
Route::patch('/completed/{id}', [TodoController::class, 'updateCompleted'])->name('update-completed');
// Route::get('/dashboard/completed', [TodoController::class, 'Complete']);
});
