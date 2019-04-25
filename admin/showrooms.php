<?php
  require_once('../server.php');
  require_once('adminhome.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Rooms</title>
    <link rel="stylesheet" type="text/css" href="../css/matrix.css">

  <script type="text/javascript" language="javascript">
    function checkThis(oCheckbox, limit)
    {
      limit=0;
    	var el, i = 0, n = limit, oForm = oCheckbox.form;
    	while (el = oForm.elements[i++])
    	{
    		if (el.className == 'single-checkbox' && el.checked)
    			--n;
    		if (n < 0)
    		{
    			alert('Editing/Viewing is not enabled yet.');
    			return false;
    		}
    	}
    	return true;
    }
  </script>

  <style media="screen" type="text/css">
    #roomsubmit{
      visibility: collapse;
    }

    #check-form {
      width: 40%;
      margin: 0px auto;
      margin-top: 30px;
      padding-top: 15px;
      padding-bottom: 0px;
      border: 1px solid #80C4DE;
      background: white;
      border-radius: 10px 10px 10px 10px;
    }

    .room label{
      /* background: darkseagreen; */
    }

    .screen-side .select-text {
    color: #969696;
    visibility: hidden;
    }

    h3{
      text-align: center;
      margin-bottom: -10px;
      margin-top: 50px;
    }
  </style>

  </head>
  <body class="root">

  <form>
    <div class="check-form" id="check-form">
    <div class="form-row"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" >
      <div class="form-group col-md-4" style="margin-left:25px;">
        <input type="date" class="form-control" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date'];} ?>" placeholder="from_date" name="from_date" required >
      </div>
      <div class="form-group col-md-4">
        <input type="date" class="form-control" placeholder="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date'];} ?>" name="to_date" required >
      </div>
    <div class="form-group col-md-2" >
      <button type="submit" class="btn btn-primary" name="check" style="margin-left:50px;">Check</button>
    </div>
    </div>
    </div>
  </form>

  <?php
   if(isset($_GET['check'])) {
    $to_date=$_GET['to_date'];
    $from_date=$_GET['from_date'];
    if($to_date<$from_date){
      echo ' </br> <div class="container"><div class="alert alert-danger alert-dismissible fade show" role="alert">' .
        'Please ensure that the dates are entered in a correct order.' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
        '<span aria-hidden="true">&times;</span></button></div></div>';
    }
    else{
     ?>
    <h3>ROOMS</h3>
    <?php require_once("../templates/matrix.php"); ?>
  <?php } } ?>

  </body>
</html>
