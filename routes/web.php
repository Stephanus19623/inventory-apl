<?php

use App\Http\Controllers\InventoryController;
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