<?php
require_once('server.php');
require_once('templates/navbar.php');

$dbc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$dbc) {
  die("Connection failed: " . mysqli_connect_error());
}

$username=$_SESSION['username'];

if(isset($_POST['update']))
{
  $name=$_POST['name'];
  $designation=$_POST['designation'];
  $email=$_POST['email'];
  $id=$_POST['id'];
  $phone=$_POST['phone'];
  $department=$_POST['department'];

  $update_status_query = "UPDATE users SET name='$name',email='$email',employeeid='$id',phone='$phone',department='$department',designation='$designation' WHERE username='$username'";
  $data = mysqli_query($dbc, $update_status_query);


  if(!$data){
    echo '<div class="container"><div class="alert alert-warning alert-dismissible fade show" role="alert">' .
    'Failed to update. Please try again.' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
    '<span aria-hidden="true">&times;</span></button></div></div>';
    die("QUERY FAILED ".mysqli_error($dbc));
  } else {
    echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">' .
    'Successfully Updated.<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
    '<span aria-hidden="true">&times;</span></button></div></div>';
  }
}

$query = "SELECT name,email,employeeid,phone,department,designation FROM users WHERE username='$username'";
$data1 = mysqli_query($dbc, $query);
$data=mysqli_fetch_array($data1);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style media="screen" type="text/css">
    form {
      width: 50%;
      margin: 50px auto 175px;
      padding: 30px;
      padding-left: 40px;
      padding-right: 0px;
      border: 1px solid #80C4DE;
      background: white;
      border-radius: 10px 10px 10px 10px;
    }
    .form-group{
      display: inline-block;
      margin-right: 40px;
    }
    .wrapper {
    text-align: center;
    margin-right: 80px;
    }

    #update{
      padding: 10px 30px;
    }
    .button {
        position: absolute;
        top: 50%;
    }
    </style>
  </head>
  <body>

    <form class="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <div class="row1">
        <div class="form-group col-md-5">
          <label for="username">Username</label>
          <input class="form-control" id="username" type="text" placeholder="Username" value="<?php if(isset($username)) echo $username; ?>"  readonly>
        </div>

        <div class="form-group col-md-5">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php if(isset($data['name'])){ echo $data['name'];} ?>" >
        </div>
      </div>
      <div class="row1">
        <div class="form-group col-md-5">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php if(isset($data['email'])) {echo $data['email'];} ?>">
        </div>
        <div class="form-group col-md-5">
          <label for="designation">Designation</label>
          <input type="text" class="form-control" id="designation" placeholder="Employee/Student" name="designation" value="<?php if(isset($data['designation'])){ echo $data['designation'];} ?>">
        </div>
      </div>
      <div class="row1">
        <div class="form-group col-md-5">
          <label for="employee-id">Employee/Student ID</label>
          <input type="text" class="form-control" id="employee-id" name="id" value="<?php if(isset($data['employeeid'])){ echo $data['employeeid'];} ?>">
        </div>
        <div class="form-group col-md-5">
          <label for="phone">Phone Number</label>
          <input type="text" class="form-control" id="phone" name="phone" value="<?php {if(isset($data['phone'])) echo $data['phone'];} ?>">
        </div>
      </div>
      <div class="wrapper">
        <div class="form-group form-inline">
          <label for="department">Department</label>
          <select id="department" class="form-control" name="department" value="<?php {if(isset($data['department'])) echo $data['department'];} ?>">
            <option selected>Computer Science and Engineering</option>
            <option>Electrical Engineering</option>
            <option>Mechanical Engineering</option>
            <option>Civil Engineering</option>
            <option>Chemical Engineering</option>
            <option>Metallurgical Engineering</option>
            <option>Others</option>
          </select>
        </div>
      </div>
      <div class="wrapper">
        <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
      </div>
    </form>

  </body>
</html>
