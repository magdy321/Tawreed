<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* تحسين الألوان */
    body {
      background-color: #2e2e2e;
    }
    .card, .table {
      background-color: #383838;
    }
    .card-header, .table th {
      background-color: #444444;
    }
    .bg-success {
      background-color: #28a745 !important;
    }
    .bg-danger {
      background-color: #dc3545 !important;
    }
    .table th, .table td {
      color: #fff;
    }
    
    /* إضافة أنيميشن */
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .shadow-hover:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .badge {
      font-size: 1.1em;
      padding: 0.5rem;
    }

    /* تعديل تنسيق الجدول */
    .table th {
      text-transform: uppercase;
      font-weight: bold;
    }
  </style>
</head>
<body class="bg-dark text-white">

<div class="container py-5 fade-in">
  <h1 class="mb-4 text-center">Dashboard</h1>

  <div class="row text-center mb-4">
    <div class="col-md-3">
      <div class="bg-primary rounded p-3 shadow-hover">
        <h5>Clients</h5>
        <h2>{{ $clientsCount }}</h2>
  
      </div>
    </div>
    <div class="col-md-3">
      <div class="bg-warning rounded p-3 shadow-hover">
        <h5>Traders</h5>
        <h2>{{ $tradersCount }}</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="bg-info rounded p-3 shadow-hover">
        <h5>Transactions</h5>
        <h2>{{ $transactionsCount }}</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="bg-danger rounded p-3 shadow-hover">
        <h5>Total Money</h5>
        <h2>{{ number_format($totalMoney, 2) }} EGP</h2>
      </div>
    </div>
  </div>

  <div class="card bg-secondary shadow">
    <div class="card-header">
      <h5>Recent Transactions</h5>
    </div>
    <div class="card-body p-0">
      <table class="table table-dark table-bordered table-hover mb-0 text-center">
        <thead>
          <tr>
            <th>#</th>
            <th>Client</th>
            <th>Product</th>
            <th>Type</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
            <tr>
              <td>{{ $transaction->id }}</td>
              <td>{{ $transaction->client->name ?? 'N/A' }}</td>
              <td>{{ $transaction->product->name ?? 'N/A' }}</td>
              <td>
                @if($transaction->transaction_type == 'in')
                  <span class="badge bg-success">In</span>
                @else
                  <span class="badge bg-danger">Out</span>
                @endif
              </td>
              <td>{{ $transaction->total_price }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
