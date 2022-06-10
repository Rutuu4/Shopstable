<x-app-layout>


    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </head>

    <body>
        <div class="container pt-5">
            <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> No of Orders</th>
                        <th> Address</th>
                        {{-- <th> Total </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->no_of_orders ? $customer->no_of_orders : 0 }}</td>
                            <td>{{ $customer->address?$customer->address:'Not available' }}</td>
                            {{-- <td>{{ $customer->total ? $customer->total : 0 }}</td> --}}
                        </tr>
                    @endforeach
                    {{ $customers }}
                </tbody>
            </table>
        </div>

    </body>
    <style>
        a {
            color: black !important;
            text-decoration: none !important;
        }
    </style>
</x-app-layout>
