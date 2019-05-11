<?php
  require_once('server.php');
  require_once('templates/navbar.php');

  if(empty($_SESSION['username'])) {
  header('location: login.php');
}

  $id=$_SESSION['id'];
  $query="SELECT number_rooms,arrival,departure FROM bookings WHERE id='$id'";
  $dbc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $data = mysqli_query($dbc, $query);
  $row = mysqli_fetch_array($data);

  //important to have a to_date and from_date wherever template/matrix.php is used.
  $from_date=$row['arrival'];
  $to_date=$row['departure'];
  $roomlimit=$row['number_rooms'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose your rooms</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/matrix.css">

  <script type="text/javascript" language="javascript">

  function checkThis(oCheckbox, limit)
  {
    var result='<?php echo $roomlimit?>';
    limit=result;
  	var el, i = 0, n = limit, oForm = oCheckbox.form;
  	while (el = oForm.elements[i++])
  	{
  		if (el.className == 'single-checkbox' && el.checked)
  			--n;
  		if (n < 0)
  		{
  			alert('Please select no more than ' + limit + ' checkboxes.')
  			return false;
  		}
  	}
  	return true;
  }
  </script>

  </head>
  <body class="root">
    <?php require_once("templates/matrix.php"); ?>
  </body>
</html>
