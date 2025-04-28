<!-- filepath: c:\laragon\www\inventory-apl\resources\views\inventory\create.blade.php -->
@extends('inventory.layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-primary mb-4">Add New Items</h1>

    <!-- Form to Add New Items -->
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="itemTable">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="items[0][name]" placeholder="Enter item name" required>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="items[0][quantity]" placeholder="Enter quantity" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary mb-3" id="addRow">Add Row</button>
        <button type="submit" class="btn btn-success">Save Items</button>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Cancel</a>
        <a href="{{ route('inventory.index') }}" class="btn btn-info">Back to Homepage</a>
    </form>
</div>

<script>
    let rowIndex = 1;

    // Add a new row to the table
    document.getElementById('addRow').addEventListener('click', function () {
        const tableBody = document.getElementById('itemTable');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="items[${rowIndex}][name]" placeholder="Enter item name" required>
            </td>
            <td>
                <input type="number" class="form-control" name="items[${rowIndex}][quantity]" placeholder="Enter quantity" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
            </td>
        `;
        tableBody.appendChild(newRow);
        rowIndex++;
    });

    // Remove a row from the table
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection