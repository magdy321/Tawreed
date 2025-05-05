<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">
    <div class="container mt-5">
      <h1 class="text-center mb-4">All Users</h1>

      <table class="table table-dark table-bordered table-hover text-center align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">type</th>
            <th scope="col">phone</th>
            <th scope="col">address</th>
            <th scope="col">date</th>
        
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
            <tr>
              <th scope="row">{{ $client->id }}</th>
              <td>{{ $client->name }}</td>
              <td>{{ $client->type }}</td>
              <td>{{ $client->phone }}</td>
              <td>{{ $client->address }}</td>
              <td>{{ $client->created_at->format('Y-m-d') }}</td>

              <td>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-success btn-sm">Edit</a>
              
                  <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
