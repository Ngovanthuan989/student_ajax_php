<?php
    require_once('dbhelp.php');
  
    if (isset($_GET['id'])) {
        # code...
       

       $update_id = $_GET['id'];
          $fullname = $age = $address = '';
           if (isset($_POST['fullname'])) {
               # code...
               $fullname = $_POST['fullname'];
           }
           if (isset($_POST['age'])) {
               # code...
               $age = $_POST['age'];
           }
           if (isset($_POST['address'])) {
               # code...
               $address = $_POST['address'];
           }

           if ($fullname!='' && $age!='' && $address!= '') {
               # code...
               $sql='update students set fullname="'.$fullname.'",age='.$age.',address="'.$address.'" where id= '.$update_id;
               execute($sql);

               header('location: index.php');
               die();
           }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Update Student</h2>
			</div>
			<div class="panel-body">
				<form method="POST">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input required="true" type="text" class="form-control" id="usr" name="fullname">
                        </div>
                        <div class="form-group">
                        <label for="birthday">Age:</label>
                        <input type="number" class="form-control" id="age" name="age">
                        </div>
                        <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <button class="btn btn-success">Save</button>
                    </div>
                </form>
		</div>
	</div>
</body>
</html>