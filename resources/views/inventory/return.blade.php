@extends('inventory.layout')

@section('content')
<div class="container">
    <h1>Return Item</h1>
    <form action="{{ route('inventory.return', $item->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="itemName" class="form-label">Item Name</label>
            <input type="text" id="itemName" class="form-control" value="{{ $item->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Current Quantity</label>
            <input type="number" id="quantity" class="form-control" value="{{ $item->quantity }}" disabled>
        </div>
        <button type="submit" class="btn btn-success">
            Confirm Return
        </button>
    </form>
</div>
@endsection