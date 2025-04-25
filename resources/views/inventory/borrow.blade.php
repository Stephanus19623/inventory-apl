@extends('inventory.layout')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Borrow Tools</h1>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Back to Homepage</a>
    </div>

    <!-- Tools Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $item->name }}</td>
                <td>
                    <p><strong>Available Quantity:</strong> {{ $item->quantity }}</p>
                    <form action="{{ route('inventory.borrow', $item->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-primary" {{ $item->quantity <= 0 ? 'disabled' : '' }}>
                            Confirm Borrow
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection