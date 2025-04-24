<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // Mencatat semua Item ( Tool )
    public function index()
    {
        $items = Item::all();
        return view('inventory.index', compact('items'));
    }

    
}
