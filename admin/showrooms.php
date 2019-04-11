<?php
  require_once('../server.php');
  require_once('adminhome.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
        <input type="date" class="form-control" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date'];} ?>" placeholder="from_date" name="from_date" min=<?php echo date('Y-m-d');?> >
      </div>
      <div class="form-group col-md-4">
        <input type="date" class="form-control" placeholder="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date'];} ?>" name="to_date" min=<?php echo date('Y-m-d');?> >
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
     ?>
    <h3>ROOMS</h3>
    <?php require_once("../templates/matrix.php"); ?>
  <?php } ?>

  </body>
</html>
