<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">

    <div class="container py-5">
      <h1 class="text-center mb-4">Create New Client</h1>

      <div class="card bg-secondary text-white shadow mx-auto" style="max-width: 600px;">
        <div class="card-body">
          <form action="{{ route('clients.store') }}" method="POST">
              @csrf

              <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input class="form-control" type="text" name="name" placeholder="Client Name" required>
              </div>    

              <div class="mb-3">
                  <label class="form-label">Phone</label>
                  <input class="form-control" type="text" name="phone" placeholder="Phone number">
              </div>

              <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input class="form-control" type="text" name="address" placeholder="Address">
              </div>

              <div class="mb-3">
                  <label class="form-label">Type</label>
                  <select class="form-select" name="type" required>
                      <option value="">-- Select Type --</option>
                      <option value="trader">Trader</option>
                      <option value="customer">Customer</option>
                  </select>
              </div>

              <button class="btn btn-light w-100" type="submit">Add Client</button>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
