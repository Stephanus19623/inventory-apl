@extends('inventory.layout')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Tools List</h1>
        <!-- Add New Item Button -->
        <a href="{{ route('inventory.borrow', ['id' => 1]) }}" class="btn btn-success">Add New Item</a>
    </div>

    <!-- Tools Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="{{ $item->quantity <= 0 ? 'table-danger' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <!-- Borrow Button -->
                        <a href="{{ route('inventory.borrow', $item->id) }}" class="btn btn-primary btn-sm" {{ $item->quantity <= 0 ? 'disabled' : '' }}>
                            Borrow
                        </a>
                        <!-- Edit Button -->
                        <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <!-- Delete Button -->
                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No items available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection