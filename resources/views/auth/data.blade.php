[12:12, 4/28/2024] Opetto: {{-- <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Log in (v2)</title>
    
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
    </head>
    
    <body class="hold-transitio…
    [13:00, 4/28/2024] Opetto: <div class="mt-4">
        <table class="table table-compact table-stripped" id="myTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama </th>
                    <th>Email</th>
                    <th>Password</th>
    
    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $p)
                    <tr>
                        <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
    
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->password }}</td>
    
    
    
                        <td>
    
                            <form action="{{ route('register.destroy', $p->id) }}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn delete-data btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
    
    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>