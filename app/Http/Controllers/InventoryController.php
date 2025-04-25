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

    // Meminjam Tool
    public function borrow(Request $request, $id = 1)
    {
        $item = Item::findOrFail($id);
        if ($item->quantity > 0) {
            //Membuat transaksi baru
            Transaction::create([
                'item_id' => $item->id,
                'user_id' => 1,
                'status' => 'borrowed',
            ]);

            // Mengurangi jumlah item
            $item->quantity--;
            $item->save();
            return redirect()->route('inventory.index')->with('success', 'Item borrowed successfully.');
        }

        return redirect()->route('inventory.index')->with('error', 'Item is out of stock.');
    }   

    // Mengembalikan Tool
    public function return(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        //Membuat transaksi baru
        Transaction::create([
            'item_id' => $item->id,
            'user_id' => 1,
            'status' => 'returned',
        ]);

        // Menambah jumlah item
        $item->quantity++;
        $item->save();
        return redirect()->route('inventory.index')->with('success', 'Item returned successfully.');
    }
    
}
