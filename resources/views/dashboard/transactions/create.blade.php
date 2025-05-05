<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">
    <div class="container py-5">
      <h1 class="text-center mb-4">Create New Transaction</h1>

      <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div class="card bg-secondary text-white mb-3 p-3">
          <div class="mb-3">
            <label class="form-label">Client</label>
            <select class="form-select" name="client_id" required>
              <option value="">-- Select Client --</option>
              @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Transaction Type</label>
            <select class="form-select" name="transaction_type" required>
              <option value="">-- Select Type --</option>
              <option value="in">In (استلام)</option>
              <option value="out">Out (تسليم)</option>
            </select>
          </div>

          <div id="products-container">
            <div class="product-item border rounded p-3 mb-3">
              <div class="row g-3">
                <div class="col-md-4">
                  <label class="form-label">Product</label>
                  <select class="form-select" name="product_id[]" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                      <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Quantity</label>
                  <input type="number" name="quantity[]" class="form-control" step="0.01" required>
                </div>
                <div class="col-md-3">
                  <label class="form-label">Unit Price</label>
                  <input type="number" name="unit_price[]" class="form-control" step="0.01" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                  <button type="button" class="btn btn-danger remove-product w-100">X</button>
                </div>
              </div>
            </div>
          </div>

          <button type="button" id="add-product" class="btn btn-light w-100 mb-3">+ Add Product</button>

          <div class="mb-3">
            <label class="form-label">Paid</label>
            <input type="number" name="paid" class="form-control" step="0.01" value="0" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea class="form-control" name="notes" rows="2"></textarea>
          </div>

          <button type="submit" class="btn btn-success w-100">Submit Transaction</button>
        </div>
      </form>
    </div>

    <script>
      const productsContainer = document.getElementById('products-container');
      document.getElementById('add-product').addEventListener('click', function () {
        const productHTML = productsContainer.firstElementChild.cloneNode(true);
        productHTML.querySelectorAll('input').forEach(input => input.value = '');
        productHTML.querySelector('select').selectedIndex = 0;
        productsContainer.appendChild(productHTML);
      });

      productsContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-product')) {
          if (productsContainer.children.length > 1) {
            e.target.closest('.product-item').remove();
          }
        }
      });
    </script>
  </body>
</html>
