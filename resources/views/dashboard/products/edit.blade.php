<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body class="bg-dark text-white">

    <div class="container py-5">
      <h1 class="text-center mb-4">Edit Product</h1>
  
      <div class="card bg-secondary text-white shadow mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- مهم جدًا -->
            
                <div class="mb-3">
                    <label class="form-label">Name Product</label>
                    <input class="form-control" type="text" name="name" value="{{ $product->name }}" placeholder="Product Name">
                </div>    
            
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" cols="30" rows="4" placeholder="Description">{{ $product->description }}</textarea>
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Price (Regular)</label>
                    <input class="form-control" type="number" value="{{ $product->price_regular }}" step="0.01" name="price_regular" placeholder="Price for Regular Customers">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price (Trader)</label>
                    <input class="form-control" type="number" value="{{ $product->price_trader }}" step="0.01" name="price_trader" placeholder="Price for Traders">
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <select class="form-select" name="unit">
                        <option value="ton" {{ $product->unit == 'ton' ? 'selected' : '' }}>طن</option>
                        <option value="m3" {{ $product->unit == 'm3' ? 'selected' : '' }}>متر</option>
                    </select>
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input class="form-control" type="text" value="{{ $product->quantity }}" name="quantity" placeholder="Enter quantity">
                </div>
            
                <button class="btn btn-light w-100" type="submit">Update Product</button>
            </form>
            
        </div>
      </div>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>
