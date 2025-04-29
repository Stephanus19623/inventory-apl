<!-- filepath: c:\laragon\www\inventory-apl\resources\views\inventory\index.blade.php -->
@extends('inventory.layout')

@section('content')
<div class="container mt-4">
    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Item list</h1>
        <!-- Add New Item Button -->
        <a href="{{ route('inventory.create') }}" class="btn btn-success">Add or Edit</a>
    </div>

    <!-- Tools Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="{{ $item->quantity <= 0 ? 'table-danger' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->quantity > 0 ? 'Borrowed' : 'Out of Stock' }}</td>
                    <td>
                        <!-- Remove Button -->
                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Return</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No items available</td> <!-- Updated colspan -->
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection