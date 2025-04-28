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
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr class="{{ $item->quantity <= 0 ? 'table-danger' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
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