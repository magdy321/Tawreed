<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">
    <div class="container mt-5">
      <h1 class="text-center mb-4">All Products</h1>

      <table class="table table-dark table-bordered table-hover text-center align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name Product</th>
            <th scope="col">Description</th>
            <th scope="col">Price (Regular)</th>
            <th scope="col">Price (Trader)</th>
            <th scope="col">Unit</th>
            <th scope="col">Quantity</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <th scope="row">{{ $product->id }}</th>
              <td>{{ $product->name }}</td>
              <td>{{ $product->description }}</td>
              <td>{{ $product->price_regular }}</td> <!-- Price for regular customers -->
              <td>{{ $product->price_trader }}</td>  <!-- Price for traders -->
              <td>{{ $product->unit }}</td>
              <td>{{ $product->quantity }}</td>
              <td>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm">Edit</a>
                  
                  <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
