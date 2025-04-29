<!-- filepath: c:\laragon\www\inventory-apl\resources\views\inventory\create.blade.php -->
@extends('inventory.layout')

@section('content')
<div class="container mt-4">
    <h1 class="text-primary mb-4">Add New Items</h1>

    <!-- Coin Counter -->
    <div class="mb-3">
        <h5>Remaining Coins: <span id="coinCounter">10</span></h5>
    </div>

    <!-- Form to Add New Items -->
    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf

        <!-- Buttons Section -->
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary me-2" id="addRow">Add New List</button>
            <button type="submit" class="btn btn-success me-2">Save Items</button>
            <a href="{{ route('inventory.index') }}" class="btn btn-secondary me-2">Cancel</a>
            <a href="{{ route('inventory.index') }}" class="btn btn-info">Back to Homepage</a>
        </div>

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
    </form>
</div>

<script>
    let rowIndex = 1;
    let remainingCoins = 9;

    // Update the coin counter display
    function updateCoinCounter() {
        document.getElementById('coinCounter').textContent = remainingCoins;
    }

    // Add a new row to the table
    document.getElementById('addRow').addEventListener('click', function () {
        const tableBody = document.getElementById('itemTable');
        const currentRowCount = tableBody.getElementsByTagName('tr').length;

        // Check if the row count is less than 10 and coins are available
        if (currentRowCount < 9 && remainingCoins > 0) {
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
            remainingCoins--; // Decrease the coin count
            updateCoinCounter();
        } else {
            alert('You can only add up to 10 items or you have no remaining coins.');
        }
    });

    // Remove a row from the table
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
            remainingCoins++; // Increase the coin count
            updateCoinCounter();
        }
    });
</script>
@endsection