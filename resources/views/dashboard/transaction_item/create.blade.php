<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Transaction Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

    <div class="container py-5">
        <h1 class="text-center mb-4">Create Transaction Item for Transaction #{{ $transaction->id }}</h1>

        <div class="card bg-secondary text-white shadow mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <form action="{{ route('transaction-items.store', $transaction->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Select Product</label>
                        <select class="form-select" name="product_id" required>
                            <option value="">-- Select Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input class="form-control" type="number" step="0.01" name="quantity" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Unit Price</label>
                        <input class="form-control" type="number" step="0.01" name="unit_price" required>
                    </div>

                    <button class="btn btn-light w-100" type="submit">Add Transaction Item</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
