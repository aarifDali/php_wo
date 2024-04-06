<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>


<div class="container">
    <center>
        Data Form
    </center>
<form action="store_data" method="POST" enctype="multipart/form-data">

@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
    
  </div>
  @error('username')
    <b>{{$message}}</b>
  @enderror

  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" name="temp_email" class="form-control" id="temp_email" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  @error('temp_email')
    <b>{{$message}}</b>
  @enderror
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile </label>
    <input type="number" name="mobile" class="form-control" id="mobile" aria-describedby="emailHelp" placeholder="Enter Mobile No:">
    
  </div>
  @error('mobile')
    <b>{{$message}}</b>
  @enderror
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  @error('password')
    <b>{{$message}}</b>
  @enderror
  <div class="form-group">
    <label for="">Image</label>
    <div class="avatar-upload">
      <div>
        <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
        <label for="image"></label>
      </div>
    </div>
  </div>
  @error('image')
    <b>{{$message}}</b>
  @enderror
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <!-- Button to go to the 'records' function -->
  <a href="{{ route('records') }}" class="btn btn-success">Go to Records</a>

</form>
</div>

<script>
  function validate()
  {
    var username = document.getElementById('username');
    var email = document.getElementById('temp_email');
    var mobile = document.getElementById('mobile');
    var password = document.getElementById('password');

    if (email.value.trim() == "")
    {
      alert('Email cannot be empty');
      email.style.border = "solid 3px red";
      return false;
    }
    else if (username.value.trim() == "")
    {
      alert('Username cannot be empty');
      username.style.border = "solid 2px red";
      return false;
    }
    else if (mobile.value.trim() == "")
    {
      alert('Mobile number cannot be empty');
      mobile.style.border = "solid 2px red";
      return false;
    }
    else if (password.value.trim() == "")
    {
      alert('Password cannot be empty');
      password.style.border = "solid 2px red";
      return false;
    }
    else if (password.value.trim().length < 5)
    {
      alert('Password must be at least 5 characters');
      password.style.border = "solid 2px red";
      return false;
    }
    else
    {
      true;
    }

  }
</script> 
<script type="text/javascript">
  function previewImage(input){
    if (input.files && imput.files[0]) {
      var reader = new FileReader();
    }
  }
</script>
</body>
</html>