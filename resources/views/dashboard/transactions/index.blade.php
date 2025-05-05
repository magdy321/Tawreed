<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">
    <div class="container mt-5">
      <h1 class="text-center mb-4">All Transactions</h1>

      <table class="table table-dark table-bordered table-hover text-center align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Client</th>
            <th>Client Type</th>
            <th>Type</th>
            <th>Paid</th>
            <th>Remaining</th>
            <th>Total</th>
            <th>Date</th>
            <th>Products</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
            <tr>
              <td>{{ $transaction->id }}</td>
              <td>{{ $transaction->client->name ?? 'N/A' }}</td>
              <td>{{ $transaction->client->type }}</td>
              <td>
                @if($transaction->transaction_type == 'in')
                  <span class="badge bg-success">In</span>
                @else
                  <span class="badge bg-danger">Out</span>
                @endif
              </td>
              <td>{{ $transaction->paid }}</td>
              <td>{{ $transaction->remaining }}</td>
              <td>{{ $transaction->total_price }}</td>
              <td>{{ optional($transaction->created_at)->format('Y-m-d') }}</td>
              <td>
                <ul class="list-unstyled text-start">
                  @foreach ($transaction->products as $product)
                    <li>
                      <strong>{{ $product->name }}</strong> - 
                      {{ $product->pivot->quantity }} × {{ $product->pivot->unit_price }} = {{ $product->pivot->total_price }}
                    </li>
                  @endforeach
                </ul>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>
