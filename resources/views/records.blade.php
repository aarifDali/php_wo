<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <center><h1>DB Records</h1></center>

    
    <div class="container">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
      </div>
      
      
  @endif
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Uername</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
@foreach($records as $record)
    <tr>
      <th>{{$record->id}}</th>
      <td>{{$record->username}}</td>
      <td>{{$record->temp_email}}</td>
      <td>{{$record->mobile}}</td>
      <td>{{$record->password}}</td>
      <td>
          <img src="{{$record->image}}" alt="User Image" width="100">
      </td>
      <td>
        <a href="edit_record/{{$record->id}}"><button class="btn btn-primary">Edit</button></a>
      </td>
      <td>

        <a href="delete_records/{{$record->id}}" onclick="return confirm('Are you sure you want to Delete?')"><button class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
@endforeach
  </tbody> 
</table>
<a href="{{ route('form') }}" class="btn btn-danger">Main Menu</a>
</div>
</body>
</html>