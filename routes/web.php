<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

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

// Route for the home page
Route::get('/', function () {
    return view('inventory.layout');
});

Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');

Route::resource('inventory', InventoryController::class);

Route::get('/borrow', [InventoryController::class, 'borrow'])->name('inventory.borrow');


Route::get('/create', [InventoryController::class, 'create'])->name('inventory.create');

Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');

// Route for return page
Route::get('/return', [InventoryController::class, 'return'])->name('inventory.return');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return 'Selamat datang di halaman home!';
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/inventory', [InventoryController::class, 'index'])
    ->name('inventory.index')
    ->middleware('auth');

    // Route untuk halaman login
Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman register
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk halaman inventory (hanya bisa diakses setelah login)
Route::get('/inventory', [InventoryController::class, 'index'])
    ->name('inventory.index')
    ->middleware('auth');