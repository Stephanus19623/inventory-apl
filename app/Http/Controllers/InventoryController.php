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

    // Creating borrow requests
    public function create()
    {
        return view('inventory.create');
    }

    // Stores the borrow request
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'items.*.name' => 'required|string|max:255',
            'items.*.quantity' => 'required|integer|min:0',
        ]);
    
        // Loop through each item and create it
        foreach ($request->items as $itemData) {
            Item::create([
                'name' => $itemData['name'],
                'quantity' => $itemData['quantity'],
            ]);
        }
    
        // Redirect back to the index page with a success message
        return redirect()->route('inventory.index')->with('success', 'Items added successfully.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('inventory.index')->with('success', 'Item deleted successfully.');
    }

    // Meminjam Tool
    public function borrow($id)
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
