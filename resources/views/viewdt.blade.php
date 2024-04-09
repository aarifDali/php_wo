<!DOCTYPE html>
<html>
<head>
    <title>DataTable</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
     
<div class="container">
    <h1>Data Table View</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Uername</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Password</th>
            <th scope="col">Photo</th>
            <th width="105px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <a href="{{ route('form') }}" class="btn btn-danger">Main Menu</a>
</div>
     
</body>
     
<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('viewdt') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'username', name: 'username'},
            {data: 'temp_email', name: 'temp_email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'password', name: 'password'},
            {
                data: 'image',
                name: 'image',
                render: function(data, type, full, meta) {
                    // return '<img src="' + data + '" alt="Image" style="max-width:100px;">';
                    if (data) {
                        return '<img src="' + data + '" alt="Image" style="max-width:100px;">';
                    } else {
                        return 'No Image Added!'; // Return an empty string if no image URL is provided
                    }
                }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
        // Handle edit action
        $('.data-table').on('click', '.edit', function () {
            var id = $(this).data('id');
            // Send AJAX request to edit_record route with id parameter
            $.get("{{ route('edit_record', ':id') }}".replace(':id', id), function (data) {
                // Handle response (e.g., open modal with edit form)
                console.log(data);
            });
        });

       // Handle delete action
        $('.data-table').on('click', '.delete', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            
            // Show confirmation dialog
            if (confirm("Are you sure you want to delete this record?")) {
                // If user confirms, send AJAX request to delete_records route with id parameter
                $.post("{{ route('delete_records', ['id' => ':id']) }}".replace(':id', id), {_token: '{{ csrf_token() }}'}, function (data) {
                    // Handle response (e.g., refresh DataTable)
                    console.log(data);
                    table.ajax.reload();
                }).fail(function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Falied to delete record!. Please try again");
                });
            }
        });
      
  });
</script>

</html>