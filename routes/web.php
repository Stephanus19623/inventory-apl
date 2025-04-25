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

Route::resource('inventory', InventoryController::class);

// Route for the inventory index page
Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');

// Route for borrow page
Route::get('/borrow/{id}', [InventoryController::class, 'borrow'])->name('inventory.borrow');

// Route for return page
Route::get('/return{id}', [InventoryController::class, 'return'])->name('inventory.return');